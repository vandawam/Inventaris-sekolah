<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatPerbaikan;

class RiwayatPerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh membuat 10 data riwayat perbaikan secara manual
        for ($i = 1; $i <= 10; $i++) {
            RiwayatPerbaikan::create([
                // Sesuaikan dengan ID barang yang valid di tabel barangs
                'barang_id'         => rand(1, 5),
                // Sesuaikan dengan ID user yang valid di tabel users
                'user_id'           => 6,
                // Tanggal perbaikan random antara 1 sampai 15 hari yang lalu
                'tanggal_perbaikan' => now()->subDays(rand(1, 15)),
                // Nilai perbaikan acak
                'harga_perbaikan'   => (string) rand(50000, 200000),
                // Detail perbaikan acak
                'detail'  => 'Detail ke-' . $i,
                // Bisa 'selesai', 'proses', atau 'pending', dsb.
                'status'            => 'pending',
            ]);
        }
    }
}
