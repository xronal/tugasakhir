<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/transactions.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $transaction = new Transaction();
                $transaction->transaction_code = $data->transaction_code;
                $transaction->transaction_date = $data->transaction_date;
                $transaction->payment_date = $data->payment_date;
                $transaction->payment_status = $data->payment_status;
                $transaction->customer_code = $data->customer_code;
                $transaction->checkin_date =  $data->checkin_date;
                $transaction->checkout_date = $data->checkout_date;
                $transaction->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
