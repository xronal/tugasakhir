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
        return view('admin.pages.user.customer.customer', $result);
    }

    public function addcustomer()
    {
        $result['datas'] = Customer::all();
        $result['users'] = User::where('role', 'user')->get();;
        return view('admin.pages.user.customer.form-customer', $result);
    }

    public function editcustomer($id)
    {
        $data = Customer::with('user')->findOrFail($id);
        return view('admin.pages.user.customer.edit-customer', compact('data'));
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

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::with('user')->findOrFail($id);
            $user = $customer->user;

            // Update user
            $user->name = $request->customer_name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->save();

            // Update customer
            $customer->customer_code = $request->customer_code;
            $customer->customer_name = $request->customer_name;
            $customer->phone = $request->phone;
            $customer->save();

            // Commit the transaction
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
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
