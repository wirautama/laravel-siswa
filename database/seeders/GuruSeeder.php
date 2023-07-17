<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            'nama' => 'Putra Angga Reksa, S.Kom',
            'jenis_kelamin' =>  'L',
            'agama' => 'Islam',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '2000-01-13',
            'alamat' => 'Jl. Citandui No.11 RT.04/01, Betro, Sedati',
            'avatar' => 'default.svg',
            'golongan' => 'IIIA',
            'jabatan' => 'Guru Pertama',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('guru')->insert([
            'nama' => 'Faizah Nur Kumala, S.Pd',
            'jenis_kelamin' =>  'P',
            'agama' => 'Islam',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '2000-01-13',
            'alamat' => 'Jl. Citandui No.11 RT.04/01, Betro, Sedati',
            'avatar' => 'default.svg',
            'golongan' => 'IIIA',
            'jabatan' => 'Guru Pertama',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('guru')->insert([
            'nama' => 'Farisah Al Mirroh, S.Pd',
            'jenis_kelamin' =>  'P',
            'agama' => 'Islam',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '2000-01-13',
            'alamat' => 'Jl. Citandui No.11 RT.04/01, Betro, Sedati',
            'avatar' => 'default.svg',
            'golongan' => 'IIIA',
            'jabatan' => 'Guru Pertama',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
