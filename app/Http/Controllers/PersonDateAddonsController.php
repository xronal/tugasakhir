<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonDateAddonsController extends Controller
{
    public function index()
    {
        return view('user.pages.person-date-addons.index');
    }
}
