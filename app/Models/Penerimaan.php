<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';

    protected $fillable = [
        'kode_penerimaan',
        'tanggal_penerimaan',
        'catatan_penerimaan',
        'status_penerimaan',
        'berkas_penerimaan'
    ];
}
