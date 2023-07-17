<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'jurusan_id' => 1,
            'nis' => '0002011434',
            'nama' => 'Aditya Wira Utama',
            'jenis_kelamin' =>  'L',
            'agama' => 'Islam',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '2000-01-13',
            'alamat' => 'Jl. Citandui No.11 RT.04/01, Betro, Sedati',
            'avatar' => 'default.svg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
