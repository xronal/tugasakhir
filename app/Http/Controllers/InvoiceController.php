<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showInvoiceForm()
    {
        return view('admin.pages.invoice.index');
    }

    public function showInvoiceListForm()
    {
        return view('admin.pages.invoice.invoice-list');
    }

    public function showInvoiceDetailForm()
    {
        return view('admin.pages.invoice.invoice-preview');
    }
}
