<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'level_id' => 1
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'email' => 'kasir@kasir.com',
                'password' => Hash::make('kasir123'),
                'level_id' => 2
            ],
            [
                'name' => 'Pengelola',
                'username' => 'pengelola',
                'email' => 'pengelola@pengelola.com',
                'password' => Hash::make('pengelola123'),
                'level_id' => 3
            ]
        ]);
    }
}
