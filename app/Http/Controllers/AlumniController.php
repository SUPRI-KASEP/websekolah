<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::latest()->paginate(12);
        return view('alumni.index', compact('alumni'));
    }
}

