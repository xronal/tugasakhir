<?php

namespace App\Http\Controllers;

use App\Models\Campsite;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDetail;
use Illuminate\Support\Facades\DB;

class PackageAdminController extends Controller
{
    public function index()
    {
        $result['datas'] = Package::all();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        $result['details'] = PackageDetail::all();
        return view('admin.pages.package.index', $result);
    }

    public function addpackage()
    {
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        return view('admin.pages.package.form-package', $result);
    }

    public function edit(Request $request)
    {
        $result['details'] = PackageDetail::where('package_code', $request->id)->get();
        $result['datas'] = Package::find($request->id);
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();
        return view('admin.pages.package.edit-package', $result);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $package = new Package();
            $package->package_code = $request->package_code;
            $package->package_name = $request->package_name;
            $package->campsite_code = $request->campsite_code;
            $package->weekday_price = $request->weekday_price;
            $package->weekend_price = $request->weekend_price;
            $package->save();

            foreach ($request->item_code as $key => $value) {
                $item = Item::find($value);
                $package_detail = new PackageDetail();
                $package_detail->package_code = $request->package_code;
                $package_detail->item_code = $value;
                $package_detail->qty = $request->quantity[$key];
                $package_detail->price = $item->item_price;
                $package_detail->save();
            }

            DB::commit();
            return redirect()->route('package.index')->with('success', 'Package created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function show(Request $request)
    {
        $package = Package::find($request->id);
        $details = PackageDetail::where('package_code', $request->id)->get();

        return response()->json([
            'package' => $package,
            'details' => $details,
        ]);
    }


    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $package = Package::find($request->package_code);
            $package->package_name = $request->package_name;
            $package->weekday_price = $request->weekday_price;
            $package->weekend_price = $request->weekend_price;
            $package->save();

            // Delete existing package details
            PackageDetail::where('package_code', $request->package_code)->delete();
            foreach ($request->item_code as $key => $value) {
                $item = Item::find($value);
                $package_detail = new PackageDetail();
                $package_detail->package_code = $request->package_code;
                $package_detail->item_code = $value;
                $package_detail->qty = $request->quantity[$key];
                $package_detail->price = $item->item_price;
                $package_detail->save();
            }

            DB::commit();
            return redirect()->route('package.index')->with('success', 'Package updated successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {
        $package = Package::find($request->id);

        if ($package) {
            $package->PackageDetail()->delete();
            $package->delete();

            return redirect()->back()->with('success', 'Package deleted successfully');
        };


        return redirect()->back()->with('Error', 'Package Cannot deleted successfully');
    }
}
