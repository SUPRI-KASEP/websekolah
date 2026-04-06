<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'pesan' => 'required|string',
        ]);

        \App\Models\Pesan::create($validated);

        return redirect()->route('kontak.index')->with('success', 'Pesan Anda berhasil dikirim! Terima kasih.');
    }
}
