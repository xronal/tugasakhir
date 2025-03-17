<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageAdminController extends Controller
{
    public function showPackageAdminForm()
    {
        return view('admin.pages.package.index');
    }
}
