<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login-register.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:7|max:255',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        $request = session();

        session()->flash('success', 'Registration successful! Please login');

        return redirect('/login');
    }
}
