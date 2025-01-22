<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function Index (Request $request)
    {
        $search = $request->query('search');
        $title = 'Jurusan';
        $raw = Jurusan::with( 'lokasis', 'barangs');

        if ($search) {
            $raw->where(function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%");
            });
        }

        $jurusan = $raw->get();


        return view('jurusan.index', compact('title', 'jurusan'));
    }

    public function show($id)
    {
        // Ambil data jurusan berdasarkan id, jika tidak ketemu akan 404
        $jurusan = Jurusan::findOrFail($id);

        // Tampilkan view jurusan.show dengan data jurusan
        // Sesuaikan nama view atau cara passing data sesuai kebutuhan Anda
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Menampilkan form edit jurusan (Route: GET /jurusan/{id}/edit).
     */
    public function edit($id)
    {
        // Ambil data jurusan berdasarkan id
        $jurusan = Jurusan::findOrFail($id);

        // Tampilkan view jurusan.edit dengan data jurusan
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Memperbarui data jurusan (Route: PUT /jurusan/{id}).
     */
    public function update(Request $request, $id)
    {
        // Validasi data (opsional, sesuaikan kebutuhan)
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            // Tambahkan validasi lain jika perlu
        ]);

        // Ambil data jurusan
        $jurusan = Jurusan::findOrFail($id);

        // Update kolom nama (dan kolom lain jika ada)
        $jurusan->nama = $validatedData['nama'];
        $jurusan->save();

        // Berikan feedback (misal redirect dan pesan sukses)
        return redirect()->route('Jurusan.show', $jurusan->id)
                         ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Menghapus data jurusan (Route: DELETE /jurusan/{id}).
     */
    public function destroy($id)
    {
        // Ambil data jurusan
        $jurusan = Jurusan::findOrFail($id);

        // Lakukan penghapusan
        $jurusan->delete();

        // Berikan feedback (misal redirect ke list jurusan)
        return redirect()->route('Jurusan')
                         ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
