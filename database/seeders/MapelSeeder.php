<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapel')->insert([
            'nama_mapel' => 'Bahasa Indonesia',
            'jurusan_id' => 1,
            'guru_id' => 1,
            'semester' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('mapel')->insert([
            'nama_mapel' => 'Matematika',
            'jurusan_id' => 1,
            'guru_id' => 1,
            'semester' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('mapel')->insert([
            'nama_mapel' => 'Bahasa Inggris',
            'jurusan_id' => 1,
            'guru_id' => 1,
            'semester' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('mapel')->insert([
            'nama_mapel' => 'Fisika',
            'jurusan_id' => 1,
            'guru_id' => 1,
            'semester' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
