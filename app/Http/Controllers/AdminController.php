<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Eskul;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\profil;
use App\Models\HistoryImage;
use App\Models\Pesan;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Alumni;
use App\Models\Mitra;
class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    // ==================== USER MANAGEMENT ====================

    public function userIndex()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,user',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role'     => $request->role,
        ]);

        return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan!');
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'role'     => 'required|in:admin,user',
        ]);

        $data = [
            'name'     => $request->name,
            'username' => $request->username,
            'role'     => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('admin.user')->with('success', 'User berhasil diperbarui!');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->route('admin.user')->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus!');
    }

    // ==================== ESKUL MANAGEMENT ====================

    public function eskulIndex()
    {
        $eskuls = Eskul::all();
        return view('admin.eskul', compact('eskuls'));
    }

    public function eskulStore(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'pembina'    => 'required|string|max:255',
            'deskripsi'  => 'required',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_eskul' => $request->nama_eskul,
            'pembina'    => $request->pembina,
            'deskripsi'  => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $image     = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        Eskul::create($data);

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil ditambahkan!');
    }

    public function eskulUpdate(Request $request, $id)
    {
        $eskul = Eskul::findOrFail($id);

        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'pembina'    => 'required|string|max:255',
            'deskripsi'  => 'required',
            'gambar'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_eskul' => $request->nama_eskul,
            'pembina'    => $request->pembina,
            'deskripsi'  => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($eskul->gambar && file_exists(public_path('assets/' . $eskul->gambar))) {
                unlink(public_path('assets/' . $eskul->gambar));
            }
            $image     = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        $eskul->update($data);

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil diperbarui!');
    }

    public function eskulDestroy($id)
    {
        $eskul = Eskul::findOrFail($id);

        if ($eskul->gambar && file_exists(public_path('assets/' . $eskul->gambar))) {
            unlink(public_path('assets/' . $eskul->gambar));
        }

        $eskul->delete();

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil dihapus!');
    }

    // ==================== FASILITAS MANAGEMENT ====================

    public function fasilitasIndex()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas', compact('fasilitas'));
    }

    public function fasilitasStore(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $image     = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function fasilitasUpdate(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($fasilitas->gambar && file_exists(public_path('assets/' . $fasilitas->gambar))) {
                unlink(public_path('assets/' . $fasilitas->gambar));
            }
            $image     = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function fasilitasDestroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        if ($fasilitas->gambar && file_exists(public_path('assets/' . $fasilitas->gambar))) {
            unlink(public_path('assets/' . $fasilitas->gambar));
        }

        $fasilitas->delete();

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil dihapus!');
    }

    // ==================== PRESTASI MANAGEMENT ====================

    public function prestasiIndex()
    {
        $prestasis = Prestasi::orderBy('id', 'desc')->get();
        return view('admin.prestasi', compact('prestasis'));
    }

    public function prestasiStore(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'isi'           => 'required',
            'kategori'      => 'nullable|string|max:100',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'        => 'nullable',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'isi'           => $request->isi,
            'kategori'      => $request->kategori ?? 'Non-Akademik',
            'status'        => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('foto')) {
            $image     = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function prestasiUpdate(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'isi'           => 'required',
            'kategori'      => 'nullable|string|max:100',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'        => 'nullable',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'isi'           => $request->isi,
            'kategori'      => $request->kategori ?? 'Non-Akademik',
            'status'        => $request->has('status') ? true : false,
        ];

        if ($request->hasFile('foto')) {
            if ($prestasi->foto && file_exists(public_path('assets/' . $prestasi->foto))) {
                unlink(public_path('assets/' . $prestasi->foto));
            }
            $image     = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function prestasiDestroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto && file_exists(public_path('assets/' . $prestasi->foto))) {
            unlink(public_path('assets/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil dihapus!');
    }

    // ==================== PROFIL MANAGEMENT ====================

    public function profilIndex()
    {
        // load historyImages untuk sejarah
        $profils = profil::with('historyImages')->orderBy('urutan')->get();
        return view('admin.Profil.manage', compact('profils'));
    }

    public function profilStore(Request $request)
    {
        // Validasi unik untuk nama_menu, tapi izinkan duplikasi untuk struktur-organisasi
        $uniqueRule = 'required|string|max:255';
        if ($request->nama_menu !== 'struktur-organisasi') {
            $uniqueRule .= '|unique:profils,nama_menu';
        }

        $request->validate([
            'nama_menu'          => $uniqueRule,
            'judul'              => 'required|string|max:255',
            'nama_kepala_sekolah'=> 'nullable|string|max:255',
            'konten'             => 'nullable',
            'isi_visi'           => 'nullable',
            'isi_misi'           => 'nullable',
            'description'        => 'nullable|string',
            'gambar'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images'             => 'nullable',
            'images.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'             => 'nullable',
            'urutan'            => 'nullable|integer|min:1',
            'jabatan'            => 'nullable|string|max:255',
            'nama'               => 'nullable|string|max:255',
        ]);

        if ($request->nama_menu === 'sambutan') {
            $request->validate(['nama_kepala_sekolah' => 'required|string|max:255']);
        }

        // Urutan: jika diisi manual gunakan itu, jika tidak ambil max + 1
        $maxUrutan = profil::max('urutan') ?? 0;
        $urutan = $request->filled('urutan') ? $request->urutan : $maxUrutan + 1;

        $data = [
            'nama_menu'           => $request->nama_menu,
            'judul'               => $request->judul,
            'nama_kepala_sekolah' => $request->nama_menu === 'sambutan' ? $request->nama_kepala_sekolah : null,
            'konten'              => $request->konten,
            'isi_visi'            => $request->isi_visi,
            'isi_misi'            => $request->isi_misi,
            'description'         => $request->description,
            'urutan'              => $urutan,
            'status'              => $request->has('status'),
        ];

        // Jabatan dan Nama untuk struktur-organisasi
        if ($request->nama_menu === 'struktur-organisasi') {
            $data['jabatan'] = $request->jabatan;
            $data['nama'] = $request->nama;
        }

        // Gambar untuk sambutAN DAN struktur-organisasi
        if (in_array($request->nama_menu, ['sambutan', 'struktur-organisasi']) && $request->hasFile('gambar')) {
            $image     = $request->file('gambar');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        } else {
            $data['gambar'] = null;
        }

        $profil = profil::create($data);

        // Gambar multiple untuk sejarah
        if ($request->nama_menu === 'sejarah' && $request->hasFile('images')) {
            $this->storeHistoryImages($request->file('images'), $profil->id);
        }

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil ditambahkan!');
    }

    public function profilUpdate(Request $request, $id)
    {
        $profil = profil::findOrFail($id);

        // Validasi unik untuk nama_menu, tapi izinkan duplikasi untuk struktur-organisasi
        $uniqueRule = 'required|string|max:255';
        if ($request->nama_menu !== 'struktur-organisasi') {
            $uniqueRule .= '|unique:profils,nama_menu,' . $id;
        }

        $request->validate([
            'nama_menu'          => $uniqueRule,
            'judul'              => 'required|string|max:255',
            'nama_kepala_sekolah'=> 'nullable|string|max:255',
            'konten'             => 'nullable',
            'isi_visi'           => 'nullable',
            'isi_misi'           => 'nullable',
            'description'        => 'nullable|string',
            'gambar'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images'             => 'nullable',
            'images.*'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'             => 'nullable',
            'urutan'            => 'nullable|integer|min:1',
            'jabatan'            => 'nullable|string|max:255',
            'nama'               => 'nullable|string|max:255',
        ]);

        if ($request->nama_menu === 'sambutan') {
            $request->validate(['nama_kepala_sekolah' => 'required|string|max:255']);
        }

        // Urutan: jika diisi manual gunakan itu, jika tidak pertahankan urutan lama
        $urutan = $request->filled('urutan') ? $request->urutan : $profil->urutan;

        $data = [
            'nama_menu'           => $request->nama_menu,
            'judul'               => $request->judul,
            'nama_kepala_sekolah' => $request->nama_menu === 'sambutan' ? $request->nama_kepala_sekolah : null,
            'konten'              => $request->konten,
            'isi_visi'            => $request->isi_visi,
            'isi_misi'            => $request->isi_misi,
            'description'         => $request->description,
            'urutan'              => $urutan,
            'status'              => $request->has('status'),
        ];

        // Jabatan dan Nama untuk struktur-organisasi
        if ($request->nama_menu === 'struktur-organisasi') {
            $data['jabatan'] = $request->jabatan;
            $data['nama'] = $request->nama;
        }

        // Gambar untuk sambutAN DAN struktur-organisasi
        if (in_array($request->nama_menu, ['sambutan', 'struktur-organisasi'])) {
            if ($request->hasFile('gambar')) {
                if ($profil->gambar && file_exists(public_path('assets/' . $profil->gambar))) {
                    unlink(public_path('assets/' . $profil->gambar));
                }
                $image     = $request->file('gambar');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets'), $imageName);
                $data['gambar'] = $imageName;
            } else {
                $data['gambar'] = $profil->gambar; // pertahankan gambar lama
            }
        } else {
            // Menu lain tidak pakai gambar — hapus bila ada
            if ($profil->gambar && !in_array($profil->nama_menu, ['sambutan', 'struktur-organisasi']) && file_exists(public_path('assets/' . $profil->gambar))) {
                unlink(public_path('assets/' . $profil->gambar));
            }
            $data['gambar'] = null;
        }

        $profil->update($data);

        // Gambar multiple untuk sejarah
        if ($request->nama_menu === 'sejarah' && $request->hasFile('images')) {
            $this->storeHistoryImages($request->file('images'), $profil->id);
        }

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    public function profilDestroy($id)
    {
        $profil = profil::findOrFail($id);

        if ($profil->gambar && file_exists(public_path('assets/' . $profil->gambar))) {
            unlink(public_path('assets/' . $profil->gambar));
        }

        if ($profil->nama_menu === 'sejarah') {
            $this->deleteAllHistoryImages($profil->id);
        }

        $profil->delete();

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil dihapus!');
    }

    // ==================== HISTORY IMAGE MANAGEMENT ====================

    protected function storeHistoryImages($images, $profilId)
    {
        foreach ($images as $image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('history', $imageName, 'public');

            HistoryImage::create([
                'profil_id'  => $profilId,
                'image_path' => $path,
            ]);
        }
    }

    protected function deleteAllHistoryImages($profilId)
    {
        $historyImages = HistoryImage::where('profil_id', $profilId)->get();

        foreach ($historyImages as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }
    }

    public function historyImageDestroy($id)
    {
        $historyImage = HistoryImage::findOrFail($id);

        if (Storage::disk('public')->exists($historyImage->image_path)) {
            Storage::disk('public')->delete($historyImage->image_path);
        }

        $historyImage->delete();

        return redirect()->route('admin.profil')->with('success', 'Foto berhasil dihapus!');
    }

    // ==================== PESAN MANAGEMENT ====================

    public function pesanIndex()
    {
        $pesans = Pesan::orderBy('created_at', 'desc')->get();
        return view('admin.pesan', compact('pesans'));
    }

    // ==================== JURUSAN MANAGEMENT ====================

    public function jurusanIndex(Request $request)
    {
        $query = Jurusan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_jurusan', 'like', "%{$search}%")
                  ->orWhere('kode_jurusan', 'like', "%{$search}%")
                  ->orWhere('ketua_jurusan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $jurusans = $query->latest()->paginate(10)->withQueryString();

        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function jurusanCreate()
    {
        return view('admin.jurusan.create');
    }

    public function pesanShow($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan-show', compact('pesan'));
    }

    public function pesanUpdate(Request $request, $id)
    {
        $pesan = Pesan::findOrFail($id);

        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required',
        ]);

        $pesan->update([
            'nama'  => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil diperbarui!');
    }

    public function pesanDestroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dihapus!');
    }

    public function jurusanStore(Request $request)
    {
        $request->validate([
            'kode_jurusan'  => 'required|string|max:10|unique:jurusans,kode_jurusan',
            'nama_jurusan'  => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'ketua_jurusan' => 'nullable|string|max:100',
            'status'        => 'required|in:aktif,nonaktif',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi.',
            'kode_jurusan.unique'   => 'Kode jurusan sudah digunakan.',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi.',
            'status.required'       => 'Status wajib dipilih.',
            'logo.image'            => 'Logo harus berupa gambar.',
            'logo.max'              => 'Logo maksimal 2 MB.',
            'foto.image'            => 'Foto harus berupa gambar.',
            'foto.max'              => 'Foto maksimal 4 MB.',
        ]);

        $data = $request->except(['logo', 'foto']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('jurusan/logo', 'public');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('jurusan/foto', 'public');
        }

        Jurusan::create($data);

        return redirect()->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function jurusanShow($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.show', compact('jurusan'));
    }

    public function jurusanEdit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function jurusanUpdate(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'kode_jurusan'  => 'required|string|max:10|unique:jurusans,kode_jurusan,' . $id,
            'nama_jurusan'  => 'required|string|max:100',
            'deskripsi'     => 'nullable|string',
            'ketua_jurusan' => 'nullable|string|max:100',
            'status'        => 'required|in:aktif,nonaktif',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi.',
            'kode_jurusan.unique'   => 'Kode jurusan sudah digunakan.',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi.',
            'status.required'       => 'Status wajib dipilih.',
            'logo.image'            => 'Logo harus berupa gambar.',
            'logo.max'              => 'Logo maksimal 2 MB.',
            'foto.image'            => 'Foto harus berupa gambar.',
            'foto.max'              => 'Foto maksimal 4 MB.',
        ]);

        $data = $request->except(['logo', 'foto', 'hapus_logo', 'hapus_foto']);

        if ($request->hasFile('logo')) {
            if ($jurusan->logo) Storage::disk('public')->delete($jurusan->logo);
            $data['logo'] = $request->file('logo')->store('jurusan/logo', 'public');
        }

        if ($request->hasFile('foto')) {
            if ($jurusan->foto) Storage::disk('public')->delete($jurusan->foto);
            $data['foto'] = $request->file('foto')->store('jurusan/foto', 'public');
        }

        if ($request->boolean('hapus_logo') && $jurusan->logo) {
            Storage::disk('public')->delete($jurusan->logo);
            $data['logo'] = null;
        }

        if ($request->boolean('hapus_foto') && $jurusan->foto) {
            Storage::disk('public')->delete($jurusan->foto);
            $data['foto'] = null;
        }

        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil diperbarui!');
    }

    public function jurusanDestroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        if ($jurusan->logo) Storage::disk('public')->delete($jurusan->logo);
        if ($jurusan->foto) Storage::disk('public')->delete($jurusan->foto);

        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil dihapus!');
    }

    // ==================== GURU MANAGEMENT ====================

    public function guruIndex()
    {
        $gurus = Guru::all();
        return view('admin.guru', compact('gurus'));
    }

    public function guruStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'matpel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'profil_singkat' => 'nullable',
        ]);

        $data = [
            'nama' => $request->nama,
            'matpel' => $request->matpel,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'profil_singkat' => $request->profil_singkat,
        ];

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        Guru::create($data);

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil ditambahkan!');
    }

    public function guruUpdate(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'matpel' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_hp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'profil_singkat' => 'nullable',
        ]);

        $data = [
            'nama' => $request->nama,
            'matpel' => $request->matpel,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'profil_singkat' => $request->profil_singkat,
        ];

        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('assets/' . $guru->foto))) {
                unlink(public_path('assets/' . $guru->foto));
            }
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        $guru->update($data);

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil diperbarui!');
    }

    public function guruDestroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && file_exists(public_path('assets/' . $guru->foto))) {
            unlink(public_path('assets/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil dihapus!');
    }

    // ==================== ALUMNI MANAGEMENT ====================

    public function alumniIndex(Request $request)
    {
        $query = Alumni::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_alumni', 'like', "%{$search}%")
                  ->orWhere('angkatan', 'like', "%{$search}%")
                  ->orWhere('pekerjaan_sekarang', 'like', "%{$search}%");
            });
        }

        $alumnis = $query->latest()->paginate(10)->withQueryString();

        return view('admin.alumni.index', compact('alumnis'));
    }

    public function alumniCreate()
    {
        return view('admin.alumni.create');
    }

    public function alumniStore(Request $request)
    {
        $request->validate([
            'nama_alumni'       => 'required|string|max:255',
            'angkatan'          => 'required|string|max:20',
            'pekerjaan_sekarang' => 'nullable|string|max:255',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'nama_alumni.required' => 'Nama alumni wajib diisi.',
            'angkatan.required'    => 'Angkatan wajib diisi.',
            'foto.image'           => 'Foto harus berupa gambar.',
            'foto.max'             => 'Foto maksimal 4 MB.',
        ]);

        $data = $request->except(['foto']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        Alumni::create($data);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil ditambahkan!');
    }

    public function alumniShow($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumni.show', compact('alumni'));
    }

    public function alumniEdit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('admin.alumni.edit', compact('alumni'));
    }

    public function alumniUpdate(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $request->validate([
            'nama_alumni'       => 'required|string|max:255',
            'angkatan'          => 'required|string|max:20',
            'pekerjaan_sekarang' => 'nullable|string|max:255',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ], [
            'nama_alumni.required' => 'Nama alumni wajib diisi.',
            'angkatan.required'    => 'Angkatan wajib diisi.',
            'foto.image'           => 'Foto harus berupa gambar.',
            'foto.max'             => 'Foto maksimal 4 MB.',
        ]);

        $data = $request->except(['foto', 'hapus_foto']);

        if ($request->hasFile('foto')) {
            if ($alumni->foto) Storage::disk('public')->delete($alumni->foto);
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        if ($request->boolean('hapus_foto') && $alumni->foto) {
            Storage::disk('public')->delete($alumni->foto);
            $data['foto'] = null;
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil diperbarui!');
    }

    public function alumniDestroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        if ($alumni->foto) Storage::disk('public')->delete($alumni->foto);

        $alumni->delete();

        return redirect()->route('admin.alumni.index')
            ->with('success', 'Alumni berhasil dihapus!');
    }

    // ==================== MITRA MANAGEMENT ====================

    public function mitraIndex(Request $request)
    {
$query = Mitra::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama-mitra', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $mitras = $query->latest()->paginate(10)->withQueryString();

        return view('admin.mitra.index', compact('mitras'));
    }

    public function mitraCreate()
    {
        return view('admin.mitra.create');
    }

    public function mitraStore(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
        ], [
            'nama_mitra.required' => 'Nama mitra wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'logo.image' => 'Logo harus gambar.',
            'logo.max' => 'Logo maks 4MB.',
        ]);

        $data = $request->except(['logo']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('mitra', 'public');
        }

Mitra::create($data);

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Mitra berhasil ditambahkan!');
    }

    public function mitraShow($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.show', compact('mitra'));
    }

    public function mitraEdit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function mitraUpdate(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);

        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
        ], [
            'nama_mitra.required' => 'Nama mitra wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
        ]);

        $data = $request->except(['logo', 'hapus_logo']);

        if ($request->hasFile('logo')) {
            if ($mitra->logo) Storage::disk('public')->delete($mitra->logo);
            $data['logo'] = $request->file('logo')->store('mitra', 'public');
        }

        if ($request->boolean('hapus_logo') && $mitra->logo) {
            Storage::disk('public')->delete($mitra->logo);
            $data['logo'] = null;
        }

        $mitra->update($data);

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Mitra berhasil diperbarui!');
    }

    public function mitraDestroy($id)
    {
        $mitra = Mitra::findOrFail($id);

        if ($mitra->logo) Storage::disk('public')->delete($mitra->logo);

        $mitra->delete();

        return redirect()->route('admin.mitra.index')
            ->with('success', 'Mitra berhasil dihapus!');
    }

}

