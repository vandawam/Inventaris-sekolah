<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function Index (Request $request)
    {
        $search = $request->query('search');
        $raw = Barang::with('lokasi', 'jurusan', 'statusBarangs');
        $title = 'Barang';

        if ($search) {
            $raw->where(function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%")
                      ->orWhere('spesifikasi', 'LIKE', "%{$search}%");
            });
        }

        $barang = $raw->get();

        return view('barang.index', compact('title','barang'));
    }

    public function show($id)
    {
        $title = 'Barang';
        $barang = Barang::findOrFail($id);
        $jurusan = Jurusan::all();
        $lokasi = Lokasi::all();

        if ($barang->user_id != Auth::user()->id) {
            return redirect()->route('Barang')
                             ->withErrors(['message' => 'Anda tidak memiliki akses ke barang ini.']);
        }

        // Tampilkan view barang.show dengan data $barang
        return view('barang.show', compact('barang' , 'title', 'jurusan', 'lokasi'));
    }

    /**
     * Menampilkan form edit barang (Route: GET /barang/{id}/edit).
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        // Tampilkan view barang.edit dengan data $barang
        return view('barang.edit', compact('barang'));
    }

    /**
     * Memperbarui data barang (Route: PUT /barang/{id} atau PATCH).
     */
    public function update(Request $request, $id)
    {
        // (Opsional) Validasi data sesuai kebutuhan
        $validatedData = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'spesifikasi'  => 'required|string|max:255',
            'sumber_dana'  => 'required|string|max:255',
            'nilai'        => 'required|string|max:255',
            'tanggal_beli' => 'required|date',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Ambil data barang yang akan diupdate
        $barang = Barang::findOrFail($id);

        // Update kolom berdasarkan $validatedData
        $barang->update($validatedData);

        // Redirect ke halaman detail barang atau ke halaman lain
        return redirect()->route('Barang.show', $barang->id)
                         ->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Menghapus data barang (Route: DELETE /barang/{id}).
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        // Redirect ke halaman daftar barang atau ke halaman lain
        // Misalnya, jika daftar barang ada di route('Barang'):
        return redirect()->route('Barang')
                         ->with('success', 'Data barang berhasil dihapus.');
    }
}
