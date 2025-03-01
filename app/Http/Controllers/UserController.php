<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserForm()
    {
        return view('admin.pages.user.index');
    }
}
