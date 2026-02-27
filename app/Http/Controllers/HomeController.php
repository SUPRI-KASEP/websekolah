<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\profil;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\Eskul;

class HomeController extends Controller
{
    public function index() {
        // Get profil data
        $sambutan = profil::where('nama_menu', 'sambutan')->where('status', true)->first();
        $visimisi = profil::where('nama_menu', 'visi-misi')->where('status', true)->first();
        $sejarah = profil::where('nama_menu', 'sejarah')->where('status', true)->first();

        // Calculate dynamic stats for sejarah
        $tahunBerdiri = $sejarah && $sejarah->tahun_berdiri ? $sejarah->tahun_berdiri : 2000;
        $jumlahSiswa = $sejarah && $sejarah->jumlah_siswa ? $sejarah->jumlah_siswa : 500;
        $lulusanSukses = $sejarah && $sejarah->lulusan_sukes ? $sejarah->lulusan_sukes : 1000;
        $tahunSekarang = date('Y');
        $lamaBeroperasi = $tahunSekarang - $tahunBerdiri;

        // Get dynamic data for home page
        $fasilitas = Fasilitas::where('status', true)->orderBy('id', 'asc')->limit(6)->get();
        $prestasis = Prestasi::orderBy('id', 'desc')->limit(4)->get();
        $eskuls = Eskul::where('status', true)->orderBy('id', 'asc')->limit(6)->get();

        return view('home', compact(
            'sambutan', 
            'visimisi', 
            'sejarah', 
            'tahunBerdiri', 
            'jumlahSiswa', 
            'lulusanSukses', 
            'lamaBeroperasi',
            'fasilitas',
            'prestasis',
            'eskuls'
        ));
    }
}
