<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Campsite;

class CampsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = json_decode(file_get_contents('database/seeders/json/campsites.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $campsite = new Campsite();
                $campsite->campsite_code = $data->campsite_code;
                $campsite->campsite_name = $data->campsite_name;
                $campsite->weekday_price = $data->weekday_price;
                $campsite->weekend_price = $data->weekend_price;
                $campsite->description = $data->description;
                $campsite->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
