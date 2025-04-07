<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactionForm()
    {
        return view('admin.pages.transaction.transaction');
    }
}
