<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/packages.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $package = new Package();
                $package->package_code = $data->package_code;
                $package->package_name = $data->package_name;
                $package->campsite_code = $data->campsite_code;
                $package->weekday_price = $data->weekday_price;
                $package->weekly_price = $data->weekly_price;
                $package->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
