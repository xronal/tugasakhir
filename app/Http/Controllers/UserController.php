<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $result['datas'] = User::paginate(10);
        return view('admin.pages.user.account.account', $result);
        // dd(User::all());
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Account created successfully');
    }

    public function show(Request $request)
    {
        $result = User::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;

        // Jika ingin ubah password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Account updated successfully');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Account deleted successfully');
    }
}
