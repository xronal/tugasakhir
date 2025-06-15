<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            ItemSeeder::class,
            CampsiteSeeder::class,
            PersonEntrySeeder::class,
            GroundSeeder::class,
            PackageSeeder::class,
            PackageDetailSeeder::class,
            TransactionSeeder::class,
            PackageTransactionSeeder::class,
            CampsiteTransactionSeeder::class,
            AddonsTransactionSeeder::class,
            PersonEntryTransactionSeeder::class
        ]);
    }
}
