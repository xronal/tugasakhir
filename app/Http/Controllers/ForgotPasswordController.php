<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('login-register.forgot-password');
    }
}
