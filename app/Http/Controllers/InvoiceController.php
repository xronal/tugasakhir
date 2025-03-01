<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoiceForm()
    {
        return view('admin.pages.invoice.index');
    }
}
