<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index() {
        $prestasis = Prestasi::orderBy('id', 'desc')->get();

        return view('Prestasi.index', compact('prestasis'));
    }
}
