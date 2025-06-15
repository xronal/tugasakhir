<?php

namespace Database\Seeders;

use App\Models\PersonEntryTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonEntryTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/person_entry_transactions.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $personentry_trans = new PersonEntryTransaction();
                $personentry_trans->transaction_code = $data->transaction_code;
                $personentry_trans->person_entry_code = $data->person_entry_code;
                $personentry_trans->qty = $data->qty;
                $personentry_trans->price = $data->price;
                $personentry_trans->amount = $data->amount;
                $personentry_trans->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
