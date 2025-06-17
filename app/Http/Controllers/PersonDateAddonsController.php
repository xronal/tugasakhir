<?php

namespace App\Http\Controllers;

use App\Models\PersonEntry;
use Illuminate\Http\Request;

class PersonDateAddonsController extends Controller
{
    public function index()
    {
        // session()->flush();
        // dd(session()->all());
        $result['personentry'] = PersonEntry::all();
        return view('user.pages.person-date-addons.index', $result);
    }

    public function diri(Request $request)
    {
        // session()->flush();

        session(['nama_pelanggan' => $request->nama_pelanggan]);
        session(['telepon' => $request->telepon]);
        session(['email' => $request->email]);
        session(['kendaraan' => $request->kendaraan]);
        session(['checkin_date' => $request->checkin_date]);
        session(['checkout_date' => $request->checkout_date]);
        $data = [];
        foreach ($request->person_entry_code as $index => $code) {
            $data[] = [
                'code' => $code,
                'quantity' => $request->person_quantity[$index],
                'price' => $request->person_price[$index],
                'amount' => $request->person_amount[$index],
            ];
        }

        session(['people' => $data]); // simpan ke 1 array: 'people'

        return redirect()->route('packages.index');
    }
}
