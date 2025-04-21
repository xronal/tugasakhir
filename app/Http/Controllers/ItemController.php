<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $result['datas'] = Item::all();
        return view('admin.pages.item.item', $result);
        // dd(Item::all());
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->item_code = $request->item_code;
        $item->item_name = $request->item_name;
        $item->item_price = $request->item_price;
        $item->save();

        return redirect()->back()->with('success', 'Item created successfully');
    }

    public function show(Request $request)
    {
        $result = Item::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        $item = Item::find($request->item_code);
        $item->item_name = $request->item_name;
        $item->item_price = $request->item_price;
        $item->save();

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function destroy(Request $request)
    {
        $item = Item::find($request->id);
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully');
    }
}
