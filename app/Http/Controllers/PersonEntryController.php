<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonEntryController extends Controller
{
    public function showPersonEntryForm()
    {
        return view('admin.pages.customer.person-entry');
    }
}
