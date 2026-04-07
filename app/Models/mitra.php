<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'nama_mitra',
        'logo',
        'deskripsi',
    ];

    protected $casts = [
        'deskripsi' => 'array', // if rich text, else string
    ];

    // Accessors for hyphenated field
    public function getNamaMitraAttribute()
    {
        return $this->getOriginal('nama-mitra');
    }

    public function setNamaMitraAttribute($value)
    {
        $this->setAttribute('nama-mitra', $value);
    }

    // Logo URL for storage/public/mitra/
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/mitra/' . $this->logo) : null;
    }
}

