<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([StateSeeder::class]);
        $this->call([CountrySeeder::class]);
        $this->call([ProspectSeeder::class]);
        $this->call([MeasurementsSeeder::class]);
        $this->call([RatesSeeder::class]);
        $this->call([PackagesSeeder::class]);
        $this->call([DiscountSeeder::class]);
    }
}
