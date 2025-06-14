<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = json_decode(file_get_contents('database/seeders/json/items.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $item = new Item();
                $item->item_code = $data->item_code;
                $item->item_name = $data->item_name;
                $item->item_price = $data->item_price;
                $item->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
