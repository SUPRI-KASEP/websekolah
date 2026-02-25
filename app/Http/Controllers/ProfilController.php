<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function vm()
    {
        return view('Profil.vm');
    }

    public function sambutan()
    {
        return view('Profil.sambutan');
    }
}
