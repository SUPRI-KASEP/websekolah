<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Eskul;

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
}
