<?php

namespace Database\Seeders;

use App\Models\Ground;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = json_decode(file_get_contents('database/seeders/json/grounds.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $ground = new Ground();
                $ground->campsite_code = $data->campsite_code;
                $ground->ground_code = $data->ground_code;
                $ground->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
