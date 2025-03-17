<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboardForm()
    {
        return view('admin.pages.dashboard.dashboard');
    }
}
