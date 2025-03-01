<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroundController extends Controller
{
    public function showGroundForm()
    {
        return view('user.pages.ground.ground');
    }
}
