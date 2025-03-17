<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageCustomerController extends Controller
{
    public function showPackageCustomerForm()
    {
        return view('user.pages.package.package');
    }
}
