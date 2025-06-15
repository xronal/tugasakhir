<?php

namespace Database\Seeders;

use App\Models\CampsiteTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampsiteTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/campsite_transactions.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $campsite_trans = new CampsiteTransaction();
                $campsite_trans->transaction_code = $data->transaction_code;
                $campsite_trans->campsite_code = $data->campsite_code;
                $campsite_trans->ground_code = $data->ground_code;
                $campsite_trans->price = $data->price;
                $campsite_trans->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
