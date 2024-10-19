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
        $Druangan = Ruangan::orderBy('updated_at', 'desc')->take(3)->get();
        $Dbarang = Barang::orderBy('updated_at', 'desc')->with('ruangan')->take(3)->get();

        return view('admin.index', compact('title', 'ruangan', 'barang', 'admin', 'petugas', 'Druangan', 'Dbarang'));
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
