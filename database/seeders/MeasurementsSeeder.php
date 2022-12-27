<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            DB::table('measurements')->insert([
                'measurement_name' => 'squarefeet',
                'measurement_short_name' => 'sqft',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'Metre',
                'measurement_short_name' => 'm',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'Minimum',
                'measurement_short_name' => 'min',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'Minute',
                'measurement_short_name' => 'minute',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'Ground',
                'measurement_short_name' => 'G',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 1',
                'measurement_short_name' => 'G + 1',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 2',
                'measurement_short_name' => 'G + 2',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 3',
                'measurement_short_name' => 'G + 3',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 4',
                'measurement_short_name' => 'G + 4',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 5',
                'measurement_short_name' => 'G + 5',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 6',
                'measurement_short_name' => 'G + 6',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 7',
                'measurement_short_name' => 'G + 7',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'G + 8 to G +12',
                'measurement_short_name' => 'G + 8 to G +12',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'HD 1280/Minute',
                'measurement_short_name' => 'HD 1280/Minute',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('measurements')->insert([
                'measurement_name' => 'Full HD 1920/Minute',
                'measurement_short_name' => 'Full HD 1920/Minute',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }