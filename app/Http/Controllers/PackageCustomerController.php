<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageCustomerController extends Controller
{
    public function index()
    {
        return view('user.pages.package.package');
    }
}
