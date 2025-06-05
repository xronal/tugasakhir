<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campsite;

class CampsiteController extends Controller
{
    public function index()
    {
        $result['datas'] = Campsite::all();
        return view('admin.pages.campsite.campsite', $result);
    }

    public function store(Request $request)
    {
        $campsite = new Campsite();
        $campsite->campsite_code = $request->campsites_code;
        $campsite->campsite_name = $request->campsites_name;
        $campsite->weekday_price = $request->weekday_price;
        $campsite->weekend_price = $request->weekend_price;
        $campsite->description = $request->description;
        $campsite->save();

        return redirect()->back()->with('success', 'Campsite created successfully');
    }

    public function show(Request $request)
    {
        $result = Campsite::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        $campsite = Campsite::find($request->campsites_code);
        $campsite->campsite_name = $request->campsites_name;
        $campsite->weekday_price = $request->weekday_price;
        $campsite->weekend_price = $request->weekend_price;
        $campsite->description = $request->description;
        $campsite->save();

        return redirect()->back()->with('success', 'Campsite updated successfully');
    }

    public function destroy(Request $request)
    {
        $campsite = Campsite::find($request->id);
        $campsite->delete();

        return redirect()->back()->with('success', 'Campsite deleted successfully');
    }
}
