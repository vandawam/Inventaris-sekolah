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
        $user = User::where('role', 'petugas')->get();
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
        $kategori = Barang::pluck('kategori')->unique();
        $sumberDana = Barang::pluck('sumber_dana')->unique();


        if ($barang->user_id != Auth::user()->id) {
            return redirect()->route('Barang')
                             ->withErrors(['message' => 'Anda tidak memiliki akses ke barang ini.']);
        }

        return view('barang.show', compact('barang' , 'title', 'jurusan', 'lokasi', 'kategori', 'sumberDana'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama'         => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'spesifikasi'  => 'required|string|max:255',
            'sumber_dana'  => 'required|string|max:255',
            'nilai'        => 'required|string|max:255',
            'tanggal_beli' => 'required|date',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update($validatedData);

        return redirect()->back()
                         ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->back()
                         ->with('success', 'Data barang berhasil dihapus.');
    }

    public function status(Request $request,$id)
    {
        $status = StatusBarang::where('barang_id', $id)->first();
        $user = Auth::user();

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
