<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'nimrah',
            'email' => 'nimrah@gmail.com',
            'email_verified_at' =>  now(),
            'password' => Hash::make('admin1234'),
            'mobile_no' => '1234567890',
            'user_role' => '1',
            'user_occupation' => 'Designer',
            'id_proof' => '',
            'created_at' => now(),
            'updated_at' => now()
       ]);
    }
} 