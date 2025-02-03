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
        $listStatus = ['Pending', 'Proses', 'Selesai'];
        $barangIds = range(2, 44, 3);

        for ($i = 0; $i <= 45; $i++) {
            RiwayatPerbaikan::create([
                'barang_id'         => $barangIds[($i) % 15],
                'user_id'           => rand(2, 8),
                'tanggal_perbaikan' => now()->subDays(rand(1, 15)),
                'harga_perbaikan'   => (string) rand(50000, 200000),
                'detail'            => 'Detail ke-' . $i,
                'status'            => $listStatus[rand(0, count($listStatus)-1)],
            ]);
        }        
    }
}
