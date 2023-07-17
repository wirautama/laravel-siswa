<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            'kd_jurusan' => 'JRS-001',
            'nama_jurusan' => 'Teknik Komputer Jaringan',
            'pj_jurusan' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('jurusan')->insert([
            'kd_jurusan' => 'JRS-002',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'pj_jurusan' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('jurusan')->insert([
            'kd_jurusan' => 'JRS-003',
            'nama_jurusan' => 'Multimedia',
            'pj_jurusan' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
