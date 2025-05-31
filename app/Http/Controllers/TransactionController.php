<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\AddOnsTrans;
use App\Models\AddonsTransaction;
use App\Models\Campsite;
use App\Models\CampsiteTransaction;
use App\Models\Customer;
use App\Models\Item;
use App\Models\PersonEntry;
use App\Models\PersonEntryTrans;
use Illuminate\Support\Facades\DB;
use App\Models\Ground;
use App\Models\PersonEntryTransaction;

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
            $transaction = new Transaction();
            $transaction->transaction_code = $request->transaction_code;
            $transaction->transaction_date = $request->transaction_date;
            $transaction->payment_date = $request->payment_date;
            $transaction->payment_status = $request->payment_status;
            $transaction->customer_code = $customer->customer_code;
            $transaction->checkin_date = $request->checkin_date;
            $transaction->checkout_date = $request->checkout_date;
            $transaction->save();

            foreach ($request->campsite_code as $key => $value) {
                $campsite = Campsite::find($value);
                $ground = Ground::find($request->ground_code);
                $campsite_trans = new CampsiteTransaction();
                $campsite_trans->transaction_code = $request->transaction_code;
                $campsite_trans->campsite_code = $value;
                $campsite_trans->ground_code = $ground->ground_code;
                $campsite_trans->price = $campsite->campsite_price[$key];
                $campsite_trans->save();
            }

            foreach ($request->item_code as $key => $value) {
                $item = Item::find($value);
                $addons_trans = new AddonsTransaction();
                $addons_trans->transaction_code = $request->transaction_code;
                $addons_trans->item_code = $value;
                $addons_trans->qty = $request->quantity[$key];
                $addons_trans->price = $item->item_price;
                $addons_trans->amount = $request->amount;
                $addons_trans->save();
            }

            foreach ($request->personentry_code as $key => $value) {
                $personentry = PersonEntry::find($value);
                $personentry_trans = new PersonEntryTransaction();
                $personentry_trans->transaction_code = $request->transaction_code;
                $personentry_trans->personentry_code = $value;
                $personentry_trans->qty = $request->personentry_qty[$key];
                $personentry_trans->price = $personentry->personentry_price;
                $personentry_trans->amount = $request->personentry_amount;
                $personentry_trans->save();
            }

            DB::commit();
            return redirect()->route('transaction.index')->with('success', 'Package created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
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
        DB::beginTransaction();
        try {
            $transaction = Transaction::find($request->transaction_code);
            $transaction->save();

            CampsiteTransaction::where('transaction_code', $request->transaction_code)->delete();
            foreach ($request->campsite_code as $key => $value) {
                $campsite = Campsite::find($value);
                $ground = Ground::find($request->ground_code);
                $campsite_trans = new CampsiteTransaction();
                $campsite_trans->transaction_code = $request->transaction_code;
                $campsite_trans->campsite_code = $value;
                $campsite_trans->ground_code = $ground->ground_code;
                $campsite_trans->price = $campsite->campsite_price[$key];
                $campsite_trans->save();
            }

            AddonsTransaction::where('transaction_code', $request->transaction_code)->delete();
            foreach ($request->item_code as $key => $value) {
                $item = Item::find($value);
                $addons_trans = new AddonsTransaction();
                $addons_trans->transaction_code = $request->transaction_code;
                $addons_trans->item_code = $value;
                $addons_trans->qty = $request->quantity[$key];
                $addons_trans->price = $item->item_price;
                $addons_trans->amount = $request->amount;
                $addons_trans->save();
            }

            PersonEntryTransaction::where('transaction_code', $request->transaction_code)->delete();
            foreach ($request->personentry_code as $key => $value) {
                $personentry = PersonEntry::find($value);
                $personentry_trans = new PersonEntryTransaction();
                $personentry_trans->transaction_code = $request->transaction_code;
                $personentry_trans->personentry_code = $value;
                $personentry_trans->qty = $request->personentry_qty[$key];
                $personentry_trans->price = $personentry->personentry_price;
                $personentry_trans->amount = $request->personentry_amount;
                $personentry_trans->save();
            }

            DB::commit();
            return redirect()->route('transaction.index')->with('success', 'Package created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if ($transaction) {
            $transaction->CampsiteTrans()->delete();
            $transaction->AddOnsTrans()->delete();
            $transaction->PersonEntryTrans()->delete();
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
}
