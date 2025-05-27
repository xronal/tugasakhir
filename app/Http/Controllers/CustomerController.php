<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $result['datas'] = Customer::paginate(10);
        $result['users'] = User::all();
        return view('admin.pages.customer.customer', $result);
    }

    public function addcustomer()
    {
        $result['datas'] = Customer::all();
        $result['users'] = User::all();
        return view('admin.pages.customer.form-customer', $result);
    }

    public function editcustomer(Request $request)
    {
        $result['datas'] = Customer::find($request->id);
        $result['users'] = User::all();
        return view('admin.pages.customer.edit-customer', $result);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find($request->user_id);
            $customer = new Customer();
            $customer->customer_code = $request->customer_code;
            $customer->customer_name = $user->name;
            $customer->phone = $request->phone;
            $customer->user_id = $request->user_id;
            $customer->save();

            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function show(Request $request)
    {
        $customer = Customer::find($request->id);
        return response()->json($customer, 200);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            foreach ($request->users_id as $key => $value) {
                $users = User::find($value);
                $customer = new Customer();
                $customer->customer_code = $request->customer_code;
                $customer->customer_name = $request->users_name;
                $customer->phone = $request->phone;
                $customer->user_id = $users->$value[$key];
                $customer->save();
            }

            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {

        $customer = Customer::find($request->id);
        $customer->delete();

        return redirect()->back()->with('Success', 'Customer deleted successfully');
    }
}
