<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampsiteTransactionController extends Controller
{
    public function index()
    {
        return view('admin.pages.transaction.campsite-trans');
    }
}
