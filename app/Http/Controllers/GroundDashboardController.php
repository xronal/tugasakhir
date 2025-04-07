<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroundDashboardController extends Controller
{
    public function showGroundDashboardForm()
    {
        return view('admin.pages.grounds.ground');
    }
}
