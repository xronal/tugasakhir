<?php

namespace App\Http\Controllers;

use App\Models\Campsite;
use App\Models\Ground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroundDashboardController extends Controller
{
    public function index()
    {
        $result['datas'] = Ground::paginate(10);
        $result['campsites'] = Campsite::all();
        return view('admin.pages.grounds.index', $result);
        // dd(Item::all());
    }

    public function store(Request $request)
    {
        $campsite = Campsite::find($request->campsite_code);
        $ground = new Ground();
        $ground->ground_code = $request->ground_code;
        $ground->campsite_code = $campsite->campsite_code;
        $ground->save();

        return redirect()->back()->with('success', 'Item created successfully');
    }

    public function show(Request $request)
    {
        $result = Ground::find($request->id);
        return response()->json($result, 200);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->campsite_code as $value) {
                $campsite = Campsite::find($value);
                $ground = new Ground();
                $ground->ground_code = $request->ground_code;
                $ground->campsite_code = $campsite->campsite_code;
                $ground->save();
            }

            DB::commit();
            return redirect()->route('grounds.index')->with('success', 'Ground created successfully');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }

        return redirect()->back()->with('success', 'Ground updated successfully');
    }

    public function destroy(Request $request)
    {
        $ground = Ground::find($request->id);
        $ground->delete();

        return redirect()->back()->with('success', 'Ground deleted successfully');
    }
}
