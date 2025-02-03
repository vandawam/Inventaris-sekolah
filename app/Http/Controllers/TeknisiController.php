<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerbaikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Teknisi';
        $raw = RiwayatPerbaikan::whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                  ->from('riwayat_perbaikans')
                  ->groupBy('barang_id');
        })->where('status', 'pending');

        if ($request->has('lokasi') && $request->query('lokasi') !== null) {
            $raw->where('lokasi_id', $request->query('lokasi'));
        }

        $data = $raw->get();
        
        return view('teknisi.index', compact('title', 'data'));
    }

    public function saya(Request $request)
    {
        $title = 'Saya';
        $raw = RiwayatPerbaikan::where('status', '<>' ,'pending')->where('user_id', Auth::user()->id);

        // if ($request->query('search')) {
        //     $raw->where('nama', 'LIKE', "%{$request->query('search')}%");
        // }

        if ($request->has('status') && $request->query('status') !== null) {
            $raw->where('status', $request->query('status'));
        }

        $data = $raw->get();

        return view('teknisi.saya', compact('title', 'data'));
    }

    public function detail($id)
    {
        $title = 'Detail Perbaikan';
        $data = RiwayatPerbaikan::where('id', $id)->first();
        $user = User::where('role', 'teknisi')->get();
        
        return view('teknisi.detail', compact('title', 'data', 'user'));
    }


    public function riwayat($id)
    {
        $title = 'Riwayat';
        $data = RiwayatPerbaikan::where('id', $id)->first();
        $user = User::where('role', 'teknisi')->get();

        if (!$data) {
            return redirect()->route('teknisi.dashboard')->with('error', 'Riwayat perbaikan tidak ditemukan.');
        }
        
        return view('teknisi.detail_riwayat', compact('title', 'data', 'user'));
    }
}
