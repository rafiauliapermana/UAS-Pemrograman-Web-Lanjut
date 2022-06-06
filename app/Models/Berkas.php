<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';

    protected $fillable = [
        'id_pengguna',
        'ktp',
        'transkip_nilai',
        'ijazah',
        'npwp'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function pengumuman()
    {
        return $this->hasOne(Pengumuman::class, 'id_berkas');
    }
}
