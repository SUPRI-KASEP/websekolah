<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = \App\Models\Jurusan::where('status', 'aktif')
            ->latest()
            ->paginate(12);

        return view('jurusan.index', compact('jurusan'));
    }
}

