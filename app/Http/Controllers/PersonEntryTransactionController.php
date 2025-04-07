<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonEntryTransactionController extends Controller
{
    public function showPersonEntryTransactionForm()
    {
        return view('admin.pages.transaction.person-entry-trans');
    }
}
