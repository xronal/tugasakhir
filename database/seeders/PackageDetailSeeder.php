<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\PackageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/package_details.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $item = Item::find($data->item_code);
                $package_detail = new PackageDetail();
                $package_detail->package_code = $data->package_code;
                $package_detail->item_code = $data->item_code;
                $package_detail->qty = $data->qty;
                $package_detail->price = $data->price;
                $package_detail->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
