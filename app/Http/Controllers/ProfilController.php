<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function vm()
    {
        return view('Profil.vm');
    }

    public function sejarah()
    {
        return view('Profil.sejarah');
    }

    public function dashboard()
    {
        $profils = profil::where('status', true)->orderBy('urutan')->get();
        return view('Profil.dashboard', compact('profils'));
    }

    public function menu($slug)
    {
        // Special handling for different menu types
        if ($slug === 'visi-misi') {
            return view('Profil.vm');
        } elseif ($slug === 'sambutan') {
            return view('Profil.sambutan');
        } elseif ($slug === 'sejarah') {
            return view('Profil.sejarah');
        } else {
            $profil = profil::where('nama_menu', $slug)->where('status', true)->firstOrFail();
            return view('Profil.detail', compact('profil'));
        }
    }

    public function sambut()
    {
        return view('Profil.sambutan');
    }
}
