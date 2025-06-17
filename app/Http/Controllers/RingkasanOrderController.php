<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\AddonsTransaction;
use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\Campsite;
use App\Models\Item;
use App\Models\Ground;
use App\Models\PersonEntry;

class RingkasanOrderController extends Controller
{
    // Menampilkan ringkasan order
    public function index()
    {
        // dd(session()->all());
        $result['nama_pelanggan'] = session('nama_pelanggan');
        $result['telepon'] = session('telepon');
        $result['email'] = session('email');
        $result['kendaraan'] = session('kendaraan');
        $result['checkin_date'] = session('checkin_date');
        $result['checkout_date'] = session('checkout_date');
        $result['person_entry_code'] = session('person_entry_code');
        $result['package'] = session('package');
        $result['groundcode'] = session('groundcode');
        $result['itemcode'] = session('itemcode');

        $result['package'] = Package::all();
        $result['details'] = PackageDetail::all();
        $result['campsite'] = Campsite::all();
        $result['item'] = Item::all();
        $result['ground'] = Ground::all();
        $result['person'] = PersonEntry::all();
        $result['customer'] = Customer::all();

        return view('user.pages.ringkasan-order.order', $result);
    }

    // Menyimpan semua data session ke database
    public function store(Request $request)
    {
        // Simpan customer
        $customer = Customer::create([
            'customer_name' => session('nama_pelanggan'),
            'customer_phone' => session('telepon'),
            'customer_email' => session('email'),
            'customer_vehicle' => session('kendaraan'),
        ]);

        // Simpan transaksi
        $transaction = Transaction::create([
            'customer_code'     => $customer->customer_id,
            'checkin_date'      => session('checkin_date'),
            'checkout_date'     => session('checkout_date'),
            'package_code'      => session('package'),
            'ground_code'       => session('groundcode'),
            'person_entry_code' => session('person_entry_code'),
        ]);

        // Simpan item tambahan (jika ada)
        $addonItems = session('itemcode') ?? [];

        if (isset($addonItems['addons_item_code'])) {
            $totalItems = count($addonItems['addons_item_code']);

            for ($i = 0; $i < $totalItems; $i++) {
                AddonsTransaction::create([
                    'transaction_code' => $transaction->transaction_id,
                    'item_code'        => $addonItems['addons_item_code'][$i],
                    'quantity'         => $addonItems['addons_quantity'][$i],
                    'price'            => $addonItems['addons_price'][$i],
                    'amount'           => $addonItems['addons_amount'][$i],
                ]);
            }
        }

        // (Opsional) Hapus session jika tidak dipakai lagi
        session()->forget([
            'nama_pelanggan',
            'telepon',
            'email',
            'kendaraan',
            'checkin_date',
            'checkout_date',
            'person_entry_code',
            'package',
            'groundcode',
            'itemcode',
        ]);

        // Redirect ke invoice atau halaman sukses
        return redirect()->route('invoice.show', $transaction->transaction_id)
            ->with('success', 'Pesanan berhasil disimpan!');
    }
}
