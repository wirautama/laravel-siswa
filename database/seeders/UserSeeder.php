<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Aditya Wira Utama',
            'level' => 'Admin',
            'email' => 'wiraaditya0@gmail.com',
            'password' => password_hash('akugakero', PASSWORD_DEFAULT),
            'avatar' => 'default.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
