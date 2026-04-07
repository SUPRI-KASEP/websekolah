<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::latest()->paginate(12);
        return view('mitra.index', compact('mitras'));
    }
}

