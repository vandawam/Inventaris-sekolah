<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Penghapus',
            'kategori' => 'Penghapus',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Penggaris',
            'kategori' => 'Penggaris',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Buku majalah sains',
            'kategori' => 'Buku',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Meja guru',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 1,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 2,
            'nama' => 'Meja guru',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 2,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 2,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 2,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 3,
            'nama' => 'Meja guru',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 3,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Tidak Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 3,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 3,
            'nama' => 'Meja murid',
            'kategori' => 'Meja',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Matematika',
            'kategori' => 'Buku',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Matematika',
            'kategori' => 'Buku',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Matematika',
            'kategori' => 'Buku',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Fisika',
            'kategori' => 'Buku',
            'status' => 'Baru',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Fisika',
            'kategori' => 'Buku',
            'status' => 'Baru',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Buku mapel Fisika',
            'kategori' => 'Buku',
            'status' => 'Baru',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Komputer petugas 1',
            'kategori' => 'Komputer',
            'status' => 'Layak Pakai',
        ]);

        Barang::create([
            'ruangan_id' => 4,
            'nama' => 'Komputer petugas 2',
            'kategori' => 'Komputer',
            'status' => 'Layak Pakai',
        ]);
    }
}
