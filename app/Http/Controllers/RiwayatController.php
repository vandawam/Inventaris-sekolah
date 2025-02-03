<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerbaikan;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayatPerbaikans = RiwayatPerbaikan::with(['barang', 'user'])->get();

        return view('riwayat_perbaikan.index', compact('riwayatPerbaikans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $users = User::all();

        return view('riwayat_perbaikan.create', compact('barangs', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id'         => 'required|exists:barangs,id',
            'user_id'           => 'required|exists:users,id',
            'tanggal_perbaikan' => 'required|date',
            'harga_perbaikan'   => 'required|integer|min:0',
            'status'            => 'required|string|max:255',
            'detail'            => 'required|string|max:255',
        ]);

        $riwayat = RiwayatPerbaikan::create($validatedData);

        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::with(['barang', 'user'])
                            ->findOrFail($id);

        return view('riwayat_perbaikan.show', compact('riwayatPerbaikan'));
    }

    public function edit($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);

        $barangs = Barang::all();
        $users = User::all();

        return view('riwayat_perbaikan.edit', compact('riwayatPerbaikan', 'barangs', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'barang_id'         => 'required|exists:barangs,id',
            'user_id'           => 'required|exists:users,id',
            'tanggal_perbaikan' => 'required|date',
            'harga_perbaikan'   => 'required|integer|min:0',
            'status'            => 'required|string|max:255',
        ]);

        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);
        $riwayatPerbaikan->update($validatedData);

        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $riwayatPerbaikan = RiwayatPerbaikan::findOrFail($id);
        $riwayatPerbaikan->delete();

        return redirect()->back()
                         ->with('success', 'Data riwayat perbaikan berhasil dihapus.');
    }
}
