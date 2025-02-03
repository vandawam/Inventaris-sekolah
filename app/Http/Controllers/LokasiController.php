<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    public function Index (Request $request)
    {
        $search = $request->query('search');
        $raw = Lokasi::with('barangs');
        $jurusan = Jurusan::all();
        $user = User::where('role', 'petugas')->get();
        $title = 'Lokasi';

        if ($search) {
            $raw->where('nama', 'LIKE', "%{$search}%");
        }

        if ($request->has('jurusan') && $request->query('jurusan') !== null) {
            $raw->where('jurusan_id', $request->query('jurusan'));
        }

        if ($request->has('petugas') && $request->query('petugas') !== null) {
            $raw->where('user_id', $request->query('petugas'));
        }

        $lokasi = $raw->get();

        return view('lokasi.index', compact('title','lokasi', 'jurusan' , 'user'));
    }

    public function show($id)
    {
        $title = 'Lokasi';
        $lokasi = Lokasi::findOrFail($id);
        $jurusan = Jurusan::all();

        if ($lokasi->user_id != Auth::user()->id) {
            return redirect()->route('Lokasi')
                             ->withErrors(['message' => 'Anda tidak memiliki akses ke lokasi ini.']);
        }

        return view('lokasi.show', compact('lokasi', 'title', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jurusan_id' => 'required|integer',
            'nama'       => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());

        $barang = Barang::where('lokasi_id', $id)->get();
        foreach ($barang as $b) {
            $b->update([
                'jurusan_id' => $validatedData['jurusan_id']
            ]);
        }
        return redirect()->back()
                         ->with('success', 'Data lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->back()
                         ->with('success', 'Data lokasi berhasil dihapus.');
    }
}
