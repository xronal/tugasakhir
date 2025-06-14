<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = json_decode(file_get_contents('database/seeders/json/user.json'));

        DB::beginTransaction();
        try {
            foreach ($datas as $key => $data) {
                $user = new User();
                $user->username = $data->username;
                $user->name = $data->name;
                $user->role = $data->role;
                $user->email = $data->email;
                $user->password = bcrypt($data->password);
                $user->save();
                DB::commit();
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
        }
    }
}
