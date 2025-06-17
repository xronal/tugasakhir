<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AddonsCustomerController extends Controller
{
    public function index($item_code = null)
    {
        // dd(session()->all());
        if ($item_code) {
            session(['item_code' => $item_code]);
        }

        $result['nama_pelanggan'] = session('nama_pelanggan');
        $result['telepon'] = session('telepon');
        $result['email'] = session('email');
        $result['kendaraan'] = session('kendaraan');
        $result['checkin_date'] = session('checkin_date');
        $result['checkout_date'] = session('checkout_date');
        $result['person_entry_code'] = session('person_entry_code');
        $result['package'] = session('package');
        $result['groundcode'] = session('groundcode');
        $result['items'] = Item::all();

        return view('user.pages.addons.addons', $result);
    }

    public function store(Request $request)
    {
        $itemCodes = $request->input('addons_item_code', []);
        $quantities = $request->input('addons_quantity', []);
        $prices = $request->input('addons_price', []);
        $amounts = $request->input('addons_amount', []);

        $addons = [];

        for ($i = 0; $i < count($itemCodes); $i++) {
            $addons[] = [
                'item_code' => $itemCodes[$i],
                'quantity' => $quantities[$i],
                'price' => $prices[$i],
                'amount' => $amounts[$i],
            ];
        }

        session(['addons' => $addons]);

        return redirect()->route('invoice'); // Ganti dengan route yang dituju selanjutnya
    }
}
