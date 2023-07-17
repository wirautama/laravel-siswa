<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nis',
        'jurusan_id',
        'nama',
        'jenis_kelamin',
        'agama',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'avatar'
    ];

    // public function mapel()
    // {
    //     return $this->hasMany(MapelSiswa::class, 'mapel_siswa');
    // }
}
