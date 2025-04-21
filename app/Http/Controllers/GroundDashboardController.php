<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroundDashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.grounds.ground');
    }
}
