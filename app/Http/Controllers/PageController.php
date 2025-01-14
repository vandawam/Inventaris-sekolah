<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function Ruang (Request $request)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        $search = $request->query('search');
        $raw = Ruangan::with('barangs');
        $title = 'Ruang';

        if ($search) {
            $raw->where('nama', 'LIKE', "%{$search}%");
        }

        $ruang = $raw->get();

        return view('page.index', compact('title','ruang'));
    }

    public function Barang (Request $request)
    {
        $search = $request->query('search');
        $raw = Barang::with('ruangan');
        $title = 'Barang';

        if ($search) {
            $raw->where(function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%")
                      ->orWhere('code', 'LIKE', "%{$search}%")
                      ->orWhere('detail', 'LIKE', "%{$search}%");
            });
        }

        $barang = $raw->get();

        return view('page.barang', compact('title','barang'));
    }
}
