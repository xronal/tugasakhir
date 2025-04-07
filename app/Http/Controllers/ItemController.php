<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function showItemForm()
    {
        return view('admin.pages.item.item');
    }
}
