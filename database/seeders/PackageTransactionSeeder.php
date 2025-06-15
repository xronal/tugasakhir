<?php

namespace Database\Seeders;

use App\Models\PackageTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/package_transactions.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $package_trans = new PackageTransaction();
                $package_trans->transaction_code = $data->transaction_code;
                $package_trans->package_code = $data->package_code;
                $package_trans->price = $data->price;
                $package_trans->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
