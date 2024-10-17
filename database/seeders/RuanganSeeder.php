<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangan::create([
            'nama' => 'Kelas Ruang 1',
            'petugas' => 2,
            'status' => 'Tersedia',
        ]);

        Ruangan::create([
            'nama' => 'Kelas Ruang 2',
            'petugas' => 2,
            'status' => 'Dipakai',
        ]);

        Ruangan::create([
            'nama' => 'Kelas Ruang 3',
            'petugas' => 2,
            'status' => 'Diperbaiki',
        ]);

        Ruangan::create([
            'nama' => 'Perpustakaan',
            'petugas' => 2,
            'status' => 'Dipakai',
        ]);
    }
}
