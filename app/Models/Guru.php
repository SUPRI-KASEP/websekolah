<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'matpel',
        'foto',
        'no_hp',
        'email',
        'profil_singkat',
    ];
}
