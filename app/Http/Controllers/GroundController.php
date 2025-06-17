<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller
{
    public function index()
    {
        $result['nama_pelanggan'] = session('nama_pelanggan');
        $result['telepon'] = session('telepon');
        $result['email'] = session('email');
        $result['kendaraan'] = session('kendaraan');
        $result['checkin_date'] = session('checkin_date');
        $result['checkout_date'] = session('checkout_date');
        $result['person_entry_code'] = session('person_entry_code');
        $result['package'] = session('package');
        // session(['package' => $package_code]);
        $orderedCodes = [
            'D05',
            'D06',
            'S11',
            'SD2',
            'S10',
            'D07',
            'S09',
            'JC07',
            'JM04',
            'D01',
            'D08',
            'JC03',
            'JC06',
            'JM03',
            'D02',
            'JC02',
            'D09',
            'S08',
            'JC05',
            'JM02',
            'D03',
            'JC01',
            'JC04',
            'JM01',
            'D04',
            'SD1',
            'D10',
            'S04',
            'S16',
            'S13',
            'S03',
            'S15',
            'S12',
            'D11',
            'S07',
            'S02',
            'S14',
            'S01',
            'S06',
            'S05',
        ];
        $result['ground'] = Ground::whereIn('ground_code', $orderedCodes)->orderByRaw("FIELD(ground_code, '" . implode("','", $orderedCodes) . "')")->get();
        return view('user.pages.ground.ground', $result);
    }

    public function pilih($ground_code)
    {
        // dd('Masuk ke fungsi pilih dengan ground_code: ' . $ground_code);
        session(['groundcode' => $ground_code]);

        return redirect()->route('tambah.index');
    }
}
