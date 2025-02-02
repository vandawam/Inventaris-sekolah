<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jurusan;
use App\Models\Lokasi;
use App\Models\RiwayatPerbaikan;
use App\Models\StatusBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function Index (Request $request)
    {
        $search = $request->query('search');
        $raw = Barang::with('lokasi', 'jurusan', 'statusBarangs');
        $jurusan = Jurusan::all();
        $user = User::all();
        $lokasi = Lokasi::all();
        $title = 'Barang';

        if ($search) {
            $raw->where(function($query) use ($search) {
                $query->where('nama', 'LIKE', "%{$search}%")
                      ->orWhere('spesifikasi', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('jurusan') && $request->query('jurusan') !== null) {
            $raw->where('jurusan_id', $request->query('jurusan'));
        }

        if ($request->has('petugas') && $request->query('petugas') !== null) {
            $raw->where('user_id', $request->query('petugas'));
        }

        if ($request->has('lokasi') && $request->query('lokasi') !== null) {
            $raw->where('lokasi_id', $request->query('lokasi'));
        }

        $barang = $raw->get();

        return view('barang.index', compact('title','barang', 'jurusan' , 'user', 'lokasi'));
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
        return redirect()->back()
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
        return redirect()->back()
                         ->with('success', 'Data barang berhasil dihapus.');
    }

    public function status(Request $request,$id)
    {
        $status = StatusBarang::where('barang_id', $id)->first();
        $user = User::where('role', 'admin')->first();

        if ($request->status== 'Rusak') {
            RiwayatPerbaikan::create([
                'user_id' => $user->id,
                'barang_id' => $id,
                'status' => 'Pending',
                'tanggal_perbaikan' => now()->format('Y-m-d'),
                'harga_perbaikan' => '0',
                'detail' =>  $request->detail
            ]);
        }

        $data = [
            'barang_id' => $id,
            'status' => $request->status
        ];

        $status->update($data);

        return redirect()->back()
                         ->with('success', 'Status barang berhasil diperbarui.');
    }
}
