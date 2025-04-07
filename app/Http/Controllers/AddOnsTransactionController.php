<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddOnsTransactionController extends Controller
{
    public function showAddOnsTransactionForm()
    {
        return view('admin.pages.transaction.addons-trans');
    }
}
