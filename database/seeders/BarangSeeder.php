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
            'nama' => 'Komputer 1',
            'kategori' => 'Komputer',
            'status' => 'Layak Pakai',
            'detail' => 'RTX 4090, 144hz, 32gb ram',
        ]);

    }
}
