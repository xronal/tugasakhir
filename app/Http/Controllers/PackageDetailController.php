<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageDetailController extends Controller
{
    public function showPackageDetailForm()
    {
        return view('admin.pages.package.package-detail');
    }
}
