<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    protected $fillable = [
        'nama_menu',
        'judul',
        'konten',
        'isi_visi',
        'isi_misi',
        'tahun_berdiri',
        'jumlah_siswa',
        'lulusan_sukes',
        'gambar',
        'urutan',
        'status',
    ];
}
