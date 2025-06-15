<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/customers.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $customer = new Customer();
                $customer->customer_code = $data->customer_code;
                $customer->customer_name = $data->customer_name;
                $customer->phone = $data->phone;
                $customer->user_id = 2;
                $customer->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
