<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $fillable = [
        'nama_menu',
        'judul',
        'konten',
        'gambar',
        'urutan',
        'status',
    ];
}
