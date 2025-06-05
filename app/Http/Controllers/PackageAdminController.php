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
        // Ambil semua package beserta details-nya (eager loading)
        $result['datas'] = Package::with('details')->get();
        $result['campsites'] = Campsite::all();
        $result['items'] = Item::all();

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
        $request->validate([
            'package_code' => 'required|string',
            'package_name' => 'required|string',
            'campsite_code' => 'required|string',
            'weekday_price' => 'required|numeric',
            'weekly_price' => 'nullable|numeric|min:0',
            'item_code' => 'required|array',
            'quantity' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $package = new Package();
            $package->package_code = $request->package_code;
            $package->package_name = $request->package_name;
            $package->campsite_code = $request->campsite_code;
            $package->weekday_price = $request->weekday_price;
            $package->weekly_price = $request->filled('weekly_price') ? $request->weekly_price : 0;
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
        $request->validate([
            'package_code' => 'required|string',
            'package_name' => 'required|string',
            'campsite_code' => 'required|string',
            'weekday_price' => 'required|numeric',
            'weekly_price' => 'nullable|numeric|min:0',
            'item_code' => 'required|array',
            'quantity' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $package = Package::find($request->package_code);
            $package->package_name = $request->package_name;
            $package->campsite_code = $request->campsite_code;
            $package->weekday_price = $request->weekday_price;
            $package->weekly_price = $request->filled('weekly_price') ? $request->weekly_price : 0;
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

    public function destroy(Request $request)
    {

        $package = Package::find($request->id);
        if ($package) {
            PackageDetail::where('package_code', $request->id)->delete();
            $package->delete();

            return redirect()->back()->with('success', 'Package deleted successfully');
        };


        return redirect()->back()->with('Error', 'Package Cannot deleted successfully');
    }
}
