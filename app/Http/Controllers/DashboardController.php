<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.dashboard');
    }

    public function indexuser()
    {
        return view('user.pages.dashboard.index');
    }
}
