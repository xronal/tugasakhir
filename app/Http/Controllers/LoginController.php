<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login-register.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        // Validasi custom: login bisa username atau email
        $credentials = $request->validate([
            'login' => ['required', function ($attribute, $value, $fail) {
                if (str_contains($value, '@')) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('The ' . $attribute . ' must be a valid email address.');
                    }
                }
            }],
            'password' => 'required'
        ]);

        $login = $request->input('login');
        $password = $request->input('password');

        // Tentukan apakah input login adalah email atau username
        $fieldType = str_contains($login, '@') ? 'email' : 'username';

        // Ambil user sesuai input
        $credentials = User::where($fieldType, $login)->first();

        // Validasi user dan password
        if (!$credentials || !Hash::check($password, $credentials->password)) {
            return back()->with('loginError', 'Login failed!');
        }

        Auth::login($credentials);
        $request->session()->regenerate();

        if ($credentials->role == 'admin') {
            return redirect()->intended('/admin');
        }

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
