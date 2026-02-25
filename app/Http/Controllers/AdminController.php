<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Eskul;
use App\Models\Fasilitas;
use App\Models\Prestasi;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    // ==================== USER MANAGEMENT ====================
    
    /**
     * Display a listing of the users.
     */
    public function userIndex()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Update the specified user in storage.
     */
    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'role' => 'required|in:admin,user',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('admin.user')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting own account
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.user')->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus!');
    }

    // ==================== ESKUL MANAGEMENT ====================
    
    /**
     * Display a listing of the eskul.
     */
    public function eskulIndex()
    {
        $eskuls = Eskul::all();
        return view('admin.eskul', compact('eskuls'));
    }

    /**
     * Store a newly created eskul in storage.
     */
    public function eskulStore(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        Eskul::create($data);

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil ditambahkan!');
    }

    /**
     * Update the specified eskul in storage.
     */
    public function eskulUpdate(Request $request, $id)
    {
        $eskul = Eskul::findOrFail($id);

        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($eskul->gambar && file_exists(public_path('assets/' . $eskul->gambar))) {
                unlink(public_path('assets/' . $eskul->gambar));
            }
            
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        $eskul->update($data);

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil diperbarui!');
    }

    /**
     * Remove the specified eskul from storage.
     */
    public function eskulDestroy($id)
    {
        $eskul = Eskul::findOrFail($id);
        
        // Delete image if exists
        if ($eskul->gambar && file_exists(public_path('assets/' . $eskul->gambar))) {
            unlink(public_path('assets/' . $eskul->gambar));
        }

        $eskul->delete();

        return redirect()->route('admin.eskul')->with('success', 'Eskul berhasil dihapus!');
    }

    // ==================== FASILITAS MANAGEMENT ====================
    
    /**
     * Display a listing of the fasilitas.
     */
    public function fasilitasIndex()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas', compact('fasilitas'));
    }

    /**
     * Store a newly created fasilitas in storage.
     */
    public function fasilitasStore(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Update the specified fasilitas in storage.
     */
    public function fasilitasUpdate(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_fasilitas' => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($fasilitas->gambar && file_exists(public_path('assets/' . $fasilitas->gambar))) {
                unlink(public_path('assets/' . $fasilitas->gambar));
            }
            
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['gambar'] = $imageName;
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified fasilitas from storage.
     */
    public function fasilitasDestroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        
        // Delete image if exists
        if ($fasilitas->gambar && file_exists(public_path('assets/' . $fasilitas->gambar))) {
            unlink(public_path('assets/' . $fasilitas->gambar));
        }

        $fasilitas->delete();

        return redirect()->route('admin.fasilitas')->with('success', 'Fasilitas berhasil dihapus!');
    }

    // ==================== PRESTASI MANAGEMENT ====================
    
    /**
     * Display a listing of the prestasi.
     */
    public function prestasiIndex()
    {
        $prestasis = Prestasi::all();
        return view('admin.prestasi', compact('prestasis'));
    }

    /**
     * Store a newly created prestasi in storage.
     */
    public function prestasiStore(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'isi' => $request->isi,
        ];

        // Handle image upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Update the specified prestasi in storage.
     */
    public function prestasiUpdate(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'nama_prestasi' => $request->nama_prestasi,
            'isi' => $request->isi,
        ];

        // Handle image upload
        if ($request->hasFile('foto')) {
            // Delete old image if exists
            if ($prestasi->foto && file_exists(public_path('assets/' . $prestasi->foto))) {
                unlink(public_path('assets/' . $prestasi->foto));
            }
            
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets'), $imageName);
            $data['foto'] = $imageName;
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui!');
    }

    /**
     * Remove the specified prestasi from storage.
     */
    public function prestasiDestroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        
        // Delete image if exists
        if ($prestasi->foto && file_exists(public_path('assets/' . $prestasi->foto))) {
            unlink(public_path('assets/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil dihapus!');
    }
}
