<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\AddonsTransaction;
use App\Models\Campsite;
use App\Models\CampsiteTransaction;
use App\Models\Customer;
use App\Models\Item;
use App\Models\PersonEntry;
use Illuminate\Support\Facades\DB;
use App\Models\Ground;
use App\Models\Package;
use App\Models\PackageTransaction;
use App\Models\PersonEntryTransaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;


class TransactionController extends Controller
{
    public function index()
    {
        $select = "trs.transaction_code, trs.transaction_date, trs.payment_date, 
                   trs.payment_status, trs.customer_code, 
                   trs.checkin_date, trs.checkout_date, trs.total_campsite_price, trs.total_addons_price, 
                   trs.total_people_entry_price, cust.customer_name";

        $result['datas'] = Transaction::selectRaw($select)
            ->from('transactions as trs')
            ->join('customers as cust', 'trs.customer_code', '=', 'cust.customer_code')
            ->get();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        $result['personentry'] = PersonEntry::all();
        $result['customers'] = Customer::all();
        $result['grounds'] = Ground::all();
        $result['packages'] = Package::all();
        return view('admin.pages.transaction.transaction', $result);
    }

    public function addtransaction()
    {
        $result['datas'] = Transaction::all();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        $result['personentry'] = PersonEntry::all();
        $result['customers'] = Customer::all();
        $result['grounds'] = Ground::all();
        $result['packages'] = Package::all();
        return view('admin.pages.transaction.form-transaction', $result);
    }


    public function edittransaction(Request $request)
    {
        $result['datas'] = Transaction::find($request->id);
        $result['addontrans'] = AddonsTransaction::where('transaction_code', $request->id)->get();
        $result['campsitetrans'] = CampsiteTransaction::where('transaction_code', $request->id)->get();
        $result['personentrytrans'] = PersonEntryTransaction::where('transaction_code', $request->id)->get();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        $result['personentry'] = PersonEntry::all();
        $result['customers'] = Customer::all();
        return view('admin.pages.transaction.edit-transaction', $result);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $customer = Customer::find($request->customer_code);
            if (!$customer) {
                return redirect()->back()->with('error', 'Customer tidak ditemukan.');
            }

            $transaction = new Transaction();
            $transaction->transaction_code = $request->transaction_code;
            $transaction->transaction_date = Carbon::parse($request->transaction_date)->format("Y-m-d H:i");
            $transaction->payment_date = Carbon::parse($request->payment_date)->format("Y-m-d H:i");
            $transaction->payment_status = $request->payment_status;
            $transaction->customer_code = $customer->customer_code;
            $transaction->checkin_date = Carbon::parse($request->checkin_date)->format("Y-m-d H:i");
            $transaction->checkout_date = Carbon::parse($request->checkout_date)->format("Y-m-d H:i");
            $transaction->save();

            Log::info('Before save', ['transaction' => $transaction]);

            // Simpan package
            if ($request->has('package_code') && is_array($request->package_code)) {
                foreach ($request->package_code as $key => $value) {
                    $package = Package::find($value);
                    if ($package) {
                        $package_trans = new PackageTransaction();
                        $package_trans->transaction_code = $request->transaction_code;
                        $package_trans->package_code = $value;
                        $package_trans->price = $package->package_price ?? 0;
                        $package_trans->save();
                    }
                }
            }

            // Simpan campsite
            if ($request->has('campsite_code') && is_array($request->campsite_code)) {
                foreach ($request->campsite_code as $key => $value) {

                    $campsite_trans = new CampsiteTransaction();
                    $campsite_trans->transaction_code = $request->transaction_code;
                    $campsite_trans->campsite_code = $value;
                    $campsite_trans->ground_code = $request->ground_code[$key];
                    $campsite_trans->price = $request->campsite_price[$key] ?? 0;
                    $campsite_trans->save();
                }
            }

            // Simpan addons/items (sesuai format addons[item_code][])
            $total_addons = 0;
            if ($request->has('addons_item_code') && is_array($request->addons_item_code)) {

                foreach ($request->addons_item_code as $key => $item_code) {
                    $addons_trans = new AddonsTransaction();
                    $addons_trans->transaction_code = $request->transaction_code;
                    $addons_trans->item_code = $item_code;
                    $addons_trans->qty = $request->addons_quantity[$key] ?? 0;
                    $addons_trans->price = $request->addons_price[$key] ?? 0;
                    $addons_trans->amount = $request->addons_amount[$key] ?? 0;
                    $addons_trans->save();
                    $total_addons += $request->addons_amount[$key];
                }
            }

            // Simpan person entry
            $total_person = 0;
            if ($request->has('person_entry_code') && is_array($request->person_entry_code)) {
                foreach ($request->person_entry_code as $key => $value) {
                    $personentry_trans = new PersonEntryTransaction();
                    $personentry_trans->transaction_code = $request->transaction_code;
                    $personentry_trans->person_entry_code = $value;
                    $personentry_trans->qty = $request->person_quantity[$key] ?? 0;
                    $personentry_trans->price = $request->person_price[$key] ?? 0;
                    $personentry_trans->amount = $request->person_amount[$key] ?? 0;
                    $personentry_trans->save();
                    $total_person += $request->person_amount[$key];
                }
            }

            DB::commit();
            return redirect()->route('transaction.index')->with('success', 'Transaction created successfully');
        } catch (\Exception $e) {
            Log::error('Gagal simpan transaksi', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return $e->getMessage();
        }
    }



    public function show(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $addonstrans = AddonsTransaction::where('transaction_code', $request->id)->get();
        $campsitetrans = CampsiteTransaction::where('transaction_code', $request->id)->get();
        $personentrytrans = PersonEntryTransaction::where('transaction_code', $request->id)->get();

        return response()->json([
            'transaction' => $transaction,
            'addonstrans' => $addonstrans,
            'campsitetrans' => $campsitetrans,
            'personentrytrans' => $personentrytrans,
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'transaction_code' => 'required|unique:transactions,transaction_code,' . $request->transaction_code . ',transaction_code',
            'customer_code' => 'required|exists:customers,customer_code',
            'transaction_date' => 'required|date',
            'payment_date' => 'nullable|date',
            'payment_status' => 'required|string',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            'package_code.*' => 'nullable|exists:packages,package_code',
            'campsite_code.*' => 'nullable|exists:campsites,campsite_code',
            'ground_code' => 'nullable|exists:grounds,ground_code',
            'addons.item_code.*' => 'nullable|exists:items,item_code',
            'addons.quantity.*' => 'nullable|integer|min:0',
            'addons.amount.*' => 'nullable|numeric|min:0',
            'personentry_code.*' => 'nullable|exists:person_entries,personentry_code',
            'personentry_qty.*' => 'nullable|integer|min:0',
            'personentry_amount.*' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $customer = Customer::find($request->customer_code);
            if (!$customer) {
                return redirect()->back()->with('error', 'Customer tidak ditemukan.');
            }

            // Cari transaksi yg ingin diupdate
            $transaction = Transaction::where('transaction_code', $request->transaction_code)->first();
            if (!$transaction) {
                return redirect()->back()->with('error', 'Transaction tidak ditemukan.');
            }

            $transaction->transaction_date = $request->transaction_date;
            $transaction->payment_date = $request->payment_date;
            $transaction->payment_status = $request->payment_status;
            $transaction->customer_code = $customer->customer_code;
            $transaction->checkin_date = $request->StartDate;
            $transaction->checkout_date = $request->EndDate;
            $transaction->save();

            // Hapus data lama dulu supaya tidak duplikat
            PackageTransaction::where('transaction_code', $transaction->transaction_code)->delete();
            CampsiteTransaction::where('transaction_code', $transaction->transaction_code)->delete();
            AddonsTransaction::where('transaction_code', $transaction->transaction_code)->delete();
            PersonEntryTransaction::where('transaction_code', $transaction->transaction_code)->delete();

            // Simpan ulang package
            if ($request->has('package_code') && is_array($request->package_code)) {
                foreach ($request->package_code as $key => $value) {
                    $package = Package::find($value);
                    if ($package) {
                        $package_trans = new PackageTransaction();
                        $package_trans->transaction_code = $transaction->transaction_code;
                        $package_trans->package_code = $value;
                        $package_trans->price = $package->package_price ?? 0;
                        $package_trans->save();
                    }
                }
            }

            // Simpan ulang campsite
            if ($request->has('campsite_code') && is_array($request->campsite_code)) {
                $ground = Ground::find($request->ground_code);
                foreach ($request->campsite_code as $key => $value) {
                    $campsite = Campsite::find($value);
                    if ($campsite && $ground) {
                        $campsite_trans = new CampsiteTransaction();
                        $campsite_trans->transaction_code = $transaction->transaction_code;
                        $campsite_trans->campsite_code = $value;
                        $campsite_trans->ground_code = $ground->ground_code;
                        $campsite_trans->price = $campsite->campsite_price ?? 0;
                        $campsite_trans->save();
                    }
                }
            }

            // Simpan ulang addons/items
            if ($request->has('addons') && is_array($request->addons)) {
                $addons = $request->addons;
                $itemCodes = $addons['item_code'] ?? [];
                $quantities = $addons['quantity'] ?? [];
                $amounts = $addons['amount'] ?? [];


                foreach ($itemCodes as $key => $itemCode) {
                    $item = Item::find($itemCode);
                    if ($item) {
                        $addons_trans = new AddonsTransaction();
                        $addons_trans->transaction_code = $transaction->transaction_code;
                        $addons_trans->item_code = $itemCode;
                        $addons_trans->qty = $quantities[$key] ?? 0;
                        $addons_trans->price = $item->item_price ?? 0;
                        $addons_trans->amount = $amounts[$key] ?? 0;
                        $addons_trans->save();
                    }
                }
            }

            // Simpan ulang person entry
            if ($request->has('personentry_code') && is_array($request->personentry_code)) {
                foreach ($request->personentry_code as $key => $value) {
                    $personentry = PersonEntry::find($value);
                    if ($personentry) {
                        $personentry_trans = new PersonEntryTransaction();
                        $personentry_trans->transaction_code = $transaction->transaction_code;
                        $personentry_trans->personentry_code = $value;
                        $personentry_trans->qty = $request->personentry_qty[$key] ?? 0;
                        $personentry_trans->price = $personentry->personentry_price ?? 0;
                        $personentry_trans->amount = $request->personentry_amount[$key] ?? 0;
                        $personentry_trans->save();
                    }
                }
            }

            DB::commit();
            return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction) {
            PackageTransaction::where('transaction_code', $request->id)->delete();
            CampsiteTransaction::where('transaction_code', $request->id)->delete();
            AddOnsTransaction::where('transaction_code', $request->id)->delete();
            PersonEntryTransaction::where('transaction_code', $request->id)->delete();
            $transaction->delete();
            return redirect()->back()->with('success', 'Transaction deleted successfully');
        };


        return redirect()->back()->with('Error', 'Transaction Cannot deleted successfully');
    }

    public function getGroundByCampsite(Request $request)
    {
        $grounds = Ground::where('campsite_code', $request->campsite_code)->get();
        return response()->json(['grounds' => $grounds], 200);
    }

    public function getDetailCampsite(Request $request)
    {
        $campsites = Campsite::where('campsite_code', $request->campsite_code)->first();
        return response()->json($campsites, 200);
    }

    public function getDetailPackage(Request $request)
    {
        $package = Package::where('package_code', $request->package_code)->first();
        return response()->json($package, 200);
    }
}
