<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageAdminController extends Controller
{
    public function index()
    {
        $result['datas'] = Package::all();
        return view('admin.pages.package.index', $result);
        // dd(Package::all());
    }

    public function store(Request $request)
    {
        $package = new Package();
        $package->package_code = $request->package_code;
        $package->package_name = $request->package_name;
        $package->campsite_code = $request->campsite_code;
        $package->package_price = $request->package_price;
        $package->save();

        return redirect()->back()->with('success', 'Package created successfully');
    }

    public function show(Request $request)
    {
        $result = Package::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        $package = Package::find($request->package_code);
        $package->package_name = $request->package_name;
        $package->package_price = $request->package_price;
        $package->save();

        return redirect()->back()->with('success', 'Package updated successfully');
    }

    public function destroy(Request $request)
    {
        $package = Package::find($request->id);
        $package->delete();

        return redirect()->back()->with('success', 'Item deleted successfully');
    }
}
