<?php

namespace App\Http\Controllers;

use App\Models\PersonEntry;
use Illuminate\Http\Request;

class PersonEntryController extends Controller
{
    public function index()
    {
        $result['datas'] = PersonEntry::all();
        return view('admin.pages.person-entry.person-entry', $result);
        // dd(Item::all());
    }

    public function store(Request $request)
    {
        $person_entry = new PersonEntry();
        $person_entry->person_entry_code = $request->person_entry_code;
        $person_entry->person_type = $request->person_type;
        $person_entry->price = $request->price;
        $person_entry->save();

        return redirect()->back()->with('success', 'Person entry created successfully');
    }

    public function show(Request $request)
    {
        $result = PersonEntry::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        $person_entry = PersonEntry::find($request->person_entry_code);
        $person_entry->person_entry_type = $request->person_type;
        $person_entry->person_entry_price = $request->price;
        $person_entry->save();

        return redirect()->back()->with('success', 'Person Entry updated successfully');
    }

    public function destroy(Request $request)
    {
        $person_entry = PersonEntry::find($request->id);
        $person_entry->delete();

        return redirect()->back()->with('success', 'Person Entry deleted successfully');
    }
}
