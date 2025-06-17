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
use App\Models\PackageDetail;
use App\Models\PackageTransaction;
use App\Models\PersonEntryTransaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


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
        $result['packagetrans'] = PackageTransaction::where('transaction_code', $request->id)->get();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        $result['personentry'] = PersonEntry::all();
        $result['customers'] = Customer::all();
        $result['packages'] = Package::all();
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
            $transaction->transaction_code = $transaction->transaction_code;
            $transaction->transaction_date = Carbon::createFromFormat('d/m/Y H:i', $request->transaction_date)->format("Y-m-d H:i");
            $transaction->payment_date = Carbon::createFromFormat('d/m/Y H:i', $request->payment_date)->format("Y-m-d H:i");
            $transaction->payment_status = $request->payment_status;
            $transaction->customer_code = $customer->customer_code;
            $transaction->checkin_date = Carbon::createFromFormat('d/m/Y H:i', $request->checkin_date)->format("Y-m-d H:i");
            $transaction->checkout_date = Carbon::createFromFormat('d/m/Y H:i', $request->checkout_date)->format("Y-m-d H:i");
            $transaction->save();

            // Simpan package
            if ($request->has('package_code') && $request->package_code) {
                $package = Package::where('package_code', $request->package_code)->first();
                if ($package) {
                    $package_trans = new PackageTransaction();
                    $package_trans->transaction_code = $transaction->transaction_code;
                    $package_trans->package_code = $request->package_code;
                    $package_trans->price = $request->package_price ?? $package->package_price ?? 0;
                    $package_trans->save();
                }
            }

            // Simpan campsite
            if ($request->has('campsite_code') && is_array($request->campsite_code)) {
                foreach ($request->campsite_code as $key => $value) {

                    $campsite_trans = new CampsiteTransaction();
                    $campsite_trans->transaction_code = $transaction->transaction_code;
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
                    $addons_trans->transaction_code = $transaction->transaction_code;
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
                    $personentry_trans->transaction_code = $transaction->transaction_code;
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
        $packagetrans = PackageTransaction::where('transaction_code', $request->id)->get();
        $addonstrans = AddonsTransaction::where('transaction_code', $request->id)->get();
        $campsitetrans = CampsiteTransaction::where('transaction_code', $request->id)->get();
        $personentrytrans = PersonEntryTransaction::where('transaction_code', $request->id)->get();

        return response()->json([
            'transaction' => $transaction,
            'packagetrans' => $packagetrans,
            'addonstrans' => $addonstrans,
            'campsitetrans' => $campsitetrans,
            'personentrytrans' => $personentrytrans,
        ]);
    }


    public function update(Request $request, $transaction_code)
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::where('transaction_code', $transaction_code)->first();
            if (!$transaction) {
                return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
            }

            $customer = Customer::find($request->customer_code);
            if (!$customer) {
                return redirect()->back()->with('error', 'Customer tidak ditemukan.');
            }

            // Update transaksi utama (tanpa mengganti transaction_code)
            $transaction->transaction_date = Carbon::createFromFormat('d/m/Y H:i', $request->transaction_date)->format("Y-m-d H:i");
            $transaction->payment_date = Carbon::createFromFormat('d/m/Y H:i', $request->payment_date)->format("Y-m-d H:i");
            $transaction->payment_status = $request->payment_status;
            $transaction->customer_code = $customer->customer_code;
            $transaction->checkin_date = Carbon::createFromFormat('d/m/Y H:i', $request->checkin_date)->format("Y-m-d H:i");
            $transaction->checkout_date = Carbon::createFromFormat('d/m/Y H:i', $request->checkout_date)->format("Y-m-d H:i");
            $transaction->save();

            // Hapus data relasi lama
            PackageTransaction::where('transaction_code', $transaction_code)->delete();
            CampsiteTransaction::where('transaction_code', $transaction_code)->delete();
            AddonsTransaction::where('transaction_code', $transaction_code)->delete();
            PersonEntryTransaction::where('transaction_code', $transaction_code)->delete();

            // Tambah ulang: package
            if ($request->has('package_code') && is_array($request->package_code)) {
                foreach ($request->package_code as $key => $value) {
                    $package = Package::find($value);
                    if ($package) {
                        $package_trans = new PackageTransaction();
                        $package_trans->transaction_code = $transaction_code;
                        $package_trans->package_code = $value;
                        $package_trans->price = $package->package_price ?? 0;
                        $package_trans->save();
                    }
                }
            }

            // Tambah ulang: campsite
            if ($request->has('campsite_code') && is_array($request->campsite_code)) {
                foreach ($request->campsite_code as $key => $value) {
                    $campsite_trans = new CampsiteTransaction();
                    $campsite_trans->transaction_code = $transaction_code;
                    $campsite_trans->campsite_code = $value;
                    $campsite_trans->ground_code = $request->ground_code[$key];
                    $campsite_trans->price = $request->campsite_price[$key] ?? 0;
                    $campsite_trans->save();
                }
            }

            // Tambah ulang: addons
            if ($request->has('addons_item_code') && is_array($request->addons_item_code)) {
                foreach ($request->addons_item_code as $key => $item_code) {
                    $addons_trans = new AddonsTransaction();
                    $addons_trans->transaction_code = $transaction_code;
                    $addons_trans->item_code = $item_code;
                    $addons_trans->qty = $request->addons_quantity[$key] ?? 0;
                    $addons_trans->price = $request->addons_price[$key] ?? 0;
                    $addons_trans->amount = $request->addons_amount[$key] ?? 0;
                    $addons_trans->save();
                }
            }

            // Tambah ulang: person entry
            if ($request->has('person_entry_code') && is_array($request->person_entry_code)) {
                foreach ($request->person_entry_code as $key => $value) {
                    $personentry_trans = new PersonEntryTransaction();
                    $personentry_trans->transaction_code = $transaction_code;
                    $personentry_trans->person_entry_code = $value;
                    $personentry_trans->qty = $request->person_quantity[$key] ?? 0;
                    $personentry_trans->price = $request->person_price[$key] ?? 0;
                    $personentry_trans->amount = $request->person_amount[$key] ?? 0;
                    $personentry_trans->save();
                }
            }

            DB::commit();
            return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
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
        $addons = PackageDetail::with('item')
            ->where('package_code', $request->package_code)
            ->get()
            ->map(function ($detail) {
                return [
                    'item_code' => $detail->item_code,
                    'item_name' => $detail->item ? $detail->item->item_name : null,
                    'quantity' => $detail->qty,
                    'price' => $detail->price,
                    'amount' => $detail->qty * $detail->price,
                ];
            });


        return response()->json([
            'weekly_price' => $package->weekly_price,
            'weekday_price' => $package->weekday_price,
            'campsite_code' => $package->campsite_code,
            'addons' => $addons,
        ]);
    }
}
