<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $result['datas'] = Admin::paginate(10);
        $result['users'] = User::all();
        return view('admin.pages.user.admin.admin', $result);
    }

    public function addadmin()
    {
        $result['datas'] = Admin::all();
        $result['admins'] = User::where('role', 'admin')->get();
        return view('admin.pages.user.admin.form-admin', $result);
    }

    public function editadmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admins = User::all(); // list user admin untuk dropdown

        return view('admin.pages.user.admin.edit-admin', compact('admin', 'admins'));
    }



    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find($request->user_id);
            $admin = new Admin();
            $admin->admin_code = $request->admin_code;
            $admin->admin_name = $user->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->job = $request->job;
            $admin->user_id = $request->user_id;
            $admin->save();

            DB::commit();
            return redirect()->route('admin.index')->with('success', 'Customer created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function show(Request $request)
    {
        $admin = Admin::find($request->id);
        return response()->json($admin, 200);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            // Update data user berdasarkan ID
            $user = User::findOrFail($id);
            $user->name = $request->admin_name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->save();

            // Update admin (jika perlu)
            $admin = Admin::where('user_id', $id)->first();
            if ($admin) {
                $admin->admin_code = $request->admin_code;
                $admin->admin_name = $request->admin_name;
                $admin->email = $request->email;
                $admin->phone = $request->phone;
                $admin->job = $request->job;
                $admin->save();
            }

            DB::commit();
            return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', 'Update failed: ' . $ex->getMessage());
        }
    }



    public function destroy(Request $request)
    {

        $admin = Admin::find($request->id);
        $admin->delete();

        return redirect()->back()->with('Success', 'Customer deleted successfully');
    }
}
