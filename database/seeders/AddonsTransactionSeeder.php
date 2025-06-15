<?php

namespace Database\Seeders;

use App\Models\AddonsTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonsTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/addons_transactions.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $addons_trans = new AddonsTransaction();
                $addons_trans->transaction_code = $data->transaction_code;
                $addons_trans->item_code = $data->item_code;
                $addons_trans->qty = $data->qty;
                $addons_trans->price = $data->price;
                $addons_trans->amount = $data->amount;
                $addons_trans->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
