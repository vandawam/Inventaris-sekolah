<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Admin';
        $ruangan = Ruangan::count();
        $barang = Barang::count();
        $admin = User::where('role', 'admin')->count();
        $petugas = User::where('role', 'petugas')->count();

        return view('admin.index', compact('title', 'ruangan', 'barang', 'admin', 'petugas'));
    }

    public function ruangan(Request $request)
    {
        $search = $request->query('search');
        $data = Ruangan::with('Upetugas', 'barangs')
                        ->when($search, function ($query) use ($search) {
                            return $query->where('nama', 'like', '%' . $search . '%')
                                         ->orWhere('status', 'like', '%' . $search . '%');
                        })
                        ->get();
        $title = 'Ruangan';

        // dd($data);
        return view('admin.pages.ruangan', compact('title', 'data'));
    }
}
