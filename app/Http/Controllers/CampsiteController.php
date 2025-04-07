<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampsiteController extends Controller
{
    public function showCampsiteForm()
    {
        return view('admin.pages.campsite.campsite');
    }
}
