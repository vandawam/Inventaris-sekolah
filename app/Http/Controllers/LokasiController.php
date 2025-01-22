<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
{
    public function Index (Request $request)
    {
        $search = $request->query('search');
        $raw = Lokasi::with('barangs');
        $title = 'Lokasi';

        if ($search) {
            $raw->where('nama', 'LIKE', "%{$search}%");
        }

        $lokasi = $raw->get();

        return view('lokasi.index', compact('title','lokasi'));
    }

    public function show($id)
    {
        // Ambil data lokasi berdasarkan id
        $title = 'Lokasi';
        $lokasi = Lokasi::findOrFail($id);
        $jurusan = Jurusan::all();

        if ($lokasi->user_id != Auth::user()->id) {
            return redirect()->route('Lokasi')
                             ->withErrors(['message' => 'Anda tidak memiliki akses ke lokasi ini.']);
        }

        // Tampilkan view 'lokasi.show' dengan data lokasi
        return view('lokasi.show', compact('lokasi', 'title', 'jurusan'));
    }

    /**
     * Memperbarui data lokasi (Route: PUT /lokasi/{id}).
     */
    public function update(Request $request, $id)
    {
        // (Opsional) Validasi data
        $validatedData = $request->validate([
            'jurusan_id' => 'required|integer',
            'nama'       => 'required|string|max:255',
            // Tambahkan validasi lain jika diperlukan
        ]);

        // Ambil data lokasi dan update isinya
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($validatedData);

        $barang = Barang::where('lokasi_id', $id)->get();
        foreach ($barang as $b) {
            $b->update([
                'jurusan_id' => $validatedData['jurusan_id']
            ]);
        }
        // Redirect ke halaman detail lokasi atau ke tempat lain
        return redirect()->route('Lokasi.show', $lokasi->id)
                         ->with('success', 'Data lokasi berhasil diperbarui.');
    }

    /**
     * Menghapus data lokasi (Route: DELETE /lokasi/{id}).
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        // Redirect ke halaman list lokasi atau ke tempat lain
        // Misalnya, jika list lokasi ada di route('Lokasi')
        return redirect()->route('Lokasi')
                         ->with('success', 'Data lokasi berhasil dihapus.');
    }
}
