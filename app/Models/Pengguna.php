<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Authenticatable
{
    use HasFactory;
    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'password',
        'tanggal_lahir',
        'level',
        'google_id'
    ];

    protected $hidden = [
        'password'
    ];
}
