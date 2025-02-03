<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Lokasi;
use App\Models\RiwayatPerbaikan;
use App\Models\Ruangan;
use App\Models\StatusBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $jurusan = Jurusan::all()->count();
        $Dlokasi = Lokasi::orderBy('updated_at', 'desc')->take(3)->get();
        $Dbarang = Barang::orderBy('updated_at', 'desc')->with('lokasi')->take(3)->get();
        $Driwayat = RiwayatPerbaikan::orderBy('updated_at', 'desc')->take(3)->get();

        return view('admin.index', compact('title', 'lokasi', 'barang', 'admin', 'petugas', 'Dlokasi', 'Dbarang', 'jurusan', 'Driwayat'));
    }

    public function ruangan(Request $request)
    {
        $search = $request->query('search');
        $data = Lokasi::with('barangs')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->get();
        $jurusan = Jurusan::all();
        $akun = User::where('role', 'petugas')->get();
        $title = 'Ruangan';

        return view('admin.pages.ruangan', compact('title', 'data', 'jurusan', 'akun'));
    }

    public function barang(Request $request)
    {
        $search = $request->query('search');
        $data = Barang::with('statusBarangs')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->get();
        $jurusan = Jurusan::all();
        $lokasi = Lokasi::all();
        $kategori = Barang::pluck('kategori')->unique();
        $sumberDana = Barang::pluck('sumber_dana')->unique();
        $akun = User::where('role', 'petugas')->get();
        $title = 'Barang';

        return view('admin.pages.barang', compact('title', 'data', 'jurusan', 'akun', 'lokasi', 'kategori', 'sumberDana'));
    }

    public function jurusan(Request $request)
    {
        $search = $request->query('search');
        $data = Jurusan::when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->get();
        $title = 'Jurusan';

        return view('admin.pages.jurusan', compact('title', 'data'));
    }


    public function akun()
    {
        $title = 'Akun';
        $akun = User::where('id', '!=', Auth::id())->get();
        return view('admin.pages.akun', compact('title', 'akun'));
    }

    public function tambah_akun(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ], [
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
        ], [
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

    public function lokasicreate(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255', 'unique:lokasis'],
        ], [
            'nama.required' => 'Nama ruangan wajib diisi.',
            'nama.unique' => 'Ruangan telah digunakan.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Lokasi::create($request->all());

        return redirect()->back()->with('success', 'Ruangan Berhasil di buat');
    }

    public function ruangan_show($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $title = 'Ruangan';
        $jurusan = Jurusan::all();
        $user = User::where('role', 'petugas')->get();

        return view('admin.pages.ruangan_show', compact('title', 'lokasi', 'jurusan' , 'user'));
    }

    public function barang_show($id)
    {
        $barang = Barang::findOrFail($id);
        $lokasi = Lokasi::all();
        $title = 'Barang';
        $jurusan = Jurusan::all();
        $user = User::where('role', 'petugas')->get();
        $teknisi = User::where('role', 'teknisi')->get();

        return view('admin.pages.barang_show', compact('title', 'lokasi', 'jurusan' , 'user', 'barang', 'teknisi'));
    }

    public function barangcreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255', 'unique:barangs'],
        ], [
            'nama.required' => 'Nama barang wajib diisi.',
            'nama.unique' => 'Barang telah digunakan.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $barang = Barang::create($request->all());

        $statusBarang = StatusBarang::create([
            'barang_id' => $barang->id,
            'status' => 'Baik',
        ]);

        return redirect()->back()->with('success', 'Barang Berhasil di buat');
    }

    public function jurusancreate(Request $request)
    {
        Jurusan::create($request->all());

        return redirect()->back()->with('success', 'Jurusan Berhasil di buat');
    }

    public function jurusanupdate(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect()->back()->with('success', 'Jurusan Berhasil diubah');
    }

    public function riwayat($id)
    {
        $title = 'Riwayat';
        $riwayat = RiwayatPerbaikan::where('id', $id)->first();
        $user = User::where('role', 'teknisi')->get();

        if (!$riwayat) {
            return redirect()->route('admin.dashboard')->with('error', 'Riwayat perbaikan tidak ditemukan.');
        }

        return view('admin.pages.riwayatperbaikan', compact('title', 'riwayat', 'user'));
    }

}
