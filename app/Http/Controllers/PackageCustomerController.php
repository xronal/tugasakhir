<?php

namespace App\Http\Controllers;

use App\Models\Campsite;
use App\Models\Item;
use App\Models\Package;
use App\Models\PackageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageCustomerController extends Controller
{
    public function index()
    {
        // Ambil data session
        $result['nama_pelanggan'] = session('nama_pelanggan');
        $result['telepon'] = session('telepon');
        $result['email'] = session('email');
        $result['kendaraan'] = session('kendaraan');
        $result['checkin_date'] = session('checkin_date');
        $result['checkout_date'] = session('checkout_date');
        $result['person_entry_code'] = session('person_entry_code');

        // Ambil data lainnya dari database
        $result['package'] = Package::with('details')->get();
        $result['campsite'] = Campsite::all();
        $result['items'] = Item::all();

        if (session()->has('package_code')) {
            $result['selected_package'] = Package::with(['details.item', 'campsite'])
                ->where('package_code', session('package_code'))->first();
        }

        return view('user.pages.package.package', $result);
    }

    public function pilihPaket(Request $request, $package_code)
    {
        $package = Package::where('package_code', $package_code)->firstOrFail();

        // Ambil tanggal checkin dari session
        $checkinDate = session('checkin_date');
        if (!$checkinDate) {
            return redirect()->route('packages.index')->with('error', 'Silakan pilih tanggal check-in terlebih dahulu.');
        }

        // Parsing tanggal checkin
        $checkin = Carbon::createFromFormat('d/m/Y H:i', $checkinDate);
        $isWeekend = $checkin->isWeekend();
        $price = $isWeekend ? $package->weekly_price : $package->weekday_price;

        // Ambil semua detail paket berdasarkan kode paket
        $details = PackageDetail::with('item') // pastikan ada relasi `item` di model PackageDetail
            ->where('package_code', $package_code)
            ->get()
            ->map(function ($detail) {
                return [
                    'item_code' => $detail->item_code,
                    'item_name' => $detail->item->item_name ?? 'Item Tidak Diketahui',
                    'qty' => $detail->qty,
                    'price' => $detail->price,
                    'total' => $detail->qty * $detail->price
                ];
            })->toArray();
        // Simpan ke session
        session([
            'selected_package_code' => $package->package_code,
            'selected_package_name' => $package->package_name,
            'selected_package_price' => $price,
            'selected_package_details' => $details,
            'selected_campsites_code' => $package->campsite_code,
        ]);

        // Redirect ke halaman pilih ground
        return redirect()->route('ground.index', ['package_code' => $package_code])
            ->with('success', 'Paket berhasil dipilih');
    }

    public function pilihcampsite($campsite_code)
    {
        $campsite = Campsite::where('campsite_code', $campsite_code)->firstOrFail();

        $checkinDate = session('checkin_date');
        if (!$checkinDate) {
            return redirect()->route('packages.index')->with('error', 'Silakan pilih tanggal check-in terlebih dahulu.');
        }

        // Parsing tanggal checkin
        $checkin = Carbon::createFromFormat('d/m/Y H:i', $checkinDate);
        $isWeekend = $checkin->isWeekend();
        $price = $isWeekend ? $campsite->weekend_price : $campsite->weekday_price;

        session(['selected_campsite_code' => $campsite->campsite_code, 'selected_campsite_name' => $campsite->campsite_name, 'selected_campsite_price' => $price,]);

        return redirect()->route('ground.index', ['package_code' => $campsite_code])
            ->with('success', 'Campsite berhasil dipilih');
    }
}
