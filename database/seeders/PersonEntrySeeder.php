<?php

namespace Database\Seeders;

use App\Models\PersonEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = json_decode(file_get_contents('database/seeders/json/person_entries.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $person_entry = new PersonEntry();
                $person_entry->person_entry_code = $data->person_entry_code;
                $person_entry->person_type = $data->person_type;
                $person_entry->price = $data->price;
                $person_entry->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
