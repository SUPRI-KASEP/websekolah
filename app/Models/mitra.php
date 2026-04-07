<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitras';

    protected $fillable = [
        'nama_mitra',
        'logo',
        'deskripsi',
    ];

    /**
     * Get logo URL for display
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('assets/' . $this->logo) : null;
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_mitra', 'like', "%{$search}%")
                     ->orWhere('deskripsi', 'like', "%{$search}%");
    }
}

