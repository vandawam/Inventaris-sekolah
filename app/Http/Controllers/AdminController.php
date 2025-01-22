<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lokasi;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Admin';
        $lokasi = Lokasi::count();
        $barang = Barang::count();
        $admin = User::where('role', 'admin')->count();
        $petugas = User::where('role', 'petugas')->count();
        $Dlokasi = Lokasi::orderBy('updated_at', 'desc')->take(3)->get();
        $Dbarang = Barang::orderBy('updated_at', 'desc')->with('lokasi')->take(3)->get();

        return view('admin.index', compact('title', 'lokasi', 'barang', 'admin', 'petugas', 'Dlokasi', 'Dbarang'));
    }

    public function ruangan(Request $request)
    {
        $search = $request->query('search');
        $data = Lokasi::with('barangs')
                        ->when($search, function ($query) use ($search) {
                            return $query->where('nama', 'like', '%' . $search . '%');
                        })
                        ->get();
        $title = 'Ruangan';

        return view('admin.pages.ruangan', compact('title', 'data'));
    }

    public function akun()
    {
        $title = 'Akun';
        $akun = User::all();
        return view('admin.pages.akun', compact('title', 'akun'));
    }

    public function tambah_akun(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'username.unique' => 'Username telah digunakan.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'role' => $request->user,
        ]);

        return redirect()->route('admin.akun')->with('success', 'Akun Berhasil di buat');
    }

public function edit_akun(Request $request, $id)
{
    $akun = User::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $akun->id],
        'password' => ['nullable', 'string', 'min:8'],
    ],[
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email telah digunakan.',
        'password.min' => 'Password minimal 8 karakter.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $akun->name = $request->name;
    $akun->email = $request->email;
    if ($request->filled('password')) {
        $akun->password = Hash::make($request->password);
    }
    $akun->role = $request->user;
    $akun->save();

    return redirect()->route('admin.akun')->with('success', 'Akun Berhasil diubah');
}

public function delete_akun($id)
{
    $akun = User::findOrFail($id);
    $akun->delete();

    return redirect()->route('admin.akun')->with('success', 'Akun Berhasil dihapus');
}

}
