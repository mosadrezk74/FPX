<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Statistics;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name_ar' => 'الأدمن  ', //user char 10
            'name_en' => 'Admin  ', //user char 10
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mohamed   Afsha ', //user char 10
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('123123123'),
        ]);

    }
}
