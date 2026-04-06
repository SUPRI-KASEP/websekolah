<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = \App\Models\Guru::all();
        return view('guru.index', compact('gurus'));
    }
}
