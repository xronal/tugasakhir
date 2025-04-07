<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showCustomerForm()
    {
        return view('admin.pages.customer.customer');
    }
}
