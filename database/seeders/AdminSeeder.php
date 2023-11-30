<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('admins')->insert([
            'name_ar' => 'Mohamed Magdy Afsha ', //user char 10
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
