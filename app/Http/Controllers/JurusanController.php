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
        $jurusan = Jurusan::findOrFail($id);
        $title = 'Jurusan';

        return view('jurusan.show', compact('jurusan', 'title'));
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::findOrFail($id);

        $jurusan->nama = $validatedData['nama'];
        $jurusan->save();

        return redirect()->route('Jurusan.show', $jurusan->id)
                         ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();

        return redirect()->back()
                         ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
