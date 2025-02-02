<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerbaikan;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Menampilkan daftar semua riwayat perbaikan (GET /riwayat_perbaikan).
     */
    public function index()
    {
        // Ambil semua data riwayat perbaikan, atau Anda bisa gunakan pagination
        // Eager load relasi barang dan user (optional, untuk optimasi)
        $riwayatPerbaikans = RiwayatPerbaikan::with(['barang', 'user'])->get();

        return view('riwayat_perbaikan.index', compact('riwayatPerbaikans'));
    }

    /**
     * Menampilkan form untuk membuat data riwayat perbaikan baru (GET /riwayat_perbaikan/create).
     */
    public function create()
    {
        // Ambil data barang dan user jika ingin mengisi via dropdown
        $barangs = Barang::all();
        $users = User::all();

        return view('riwayat_perbaikan.create', compact('barangs', 'users'));
    }

    /**
     * Menyimpan data riwayat perbaikan baru (POST /riwayat_perbaikan).
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'barang_id'         => 'required|exists:barangs,id',
            'user_id'           => 'required|exists:users,id',
            'tanggal_perbaikan' => 'required|date',
            'harga_perbaikan'   => 'required|integer|min:0',
            'status'            => 'required|string|max:255',
            'detail'            => 'required|string|max:255',
        ]);

        // Simpan ke database
        $riwayat = RiwayatPerbaikan::create($validatedData);

        // Redirect ke halaman index (atau halaman detail)
        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail 1 data riwayat perbaikan (GET /riwayat_perbaikan/{id}).
     */
    public function show($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::with(['barang', 'user'])
                            ->findOrFail($id);

        return view('riwayat_perbaikan.show', compact('riwayatPerbaikan'));
    }

    /**
     * Menampilkan form edit data riwayat perbaikan (GET /riwayat_perbaikan/{id}/edit).
     */
    public function edit($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);

        // Ambil data barang dan user jika form edit butuh pilihan dropdown
        $barangs = Barang::all();
        $users = User::all();

        return view('riwayat_perbaikan.edit', compact('riwayatPerbaikan', 'barangs', 'users'));
    }

    /**
     * Mengupdate data riwayat perbaikan (PUT/PATCH /riwayat_perbaikan/{id}).
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $validatedData = $request->validate([
            'barang_id'         => 'required|exists:barangs,id',
            'user_id'           => 'required|exists:users,id',
            'tanggal_perbaikan' => 'required|date',
            'harga_perbaikan'   => 'required|integer|min:0',
            'status'            => 'required|string|max:255',
        ]);

        // Temukan record
        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);
        // Update
        $riwayatPerbaikan->update($validatedData);

        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil diperbarui.');
    }

    /**
     * Menghapus data riwayat perbaikan (DELETE /riwayat_perbaikan/{id}).
     */
    public function destroy($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);
        $riwayatPerbaikan->delete();

        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil dihapus.');
    }
}
