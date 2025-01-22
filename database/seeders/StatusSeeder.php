<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumsi jumlah barang yang ada di tabel barangs adalah 25 (id: 1 s/d 25).
        $totalBarangs = 25;

        // Array pilihan status
        $listStatus = ['Baik', 'Rusak', 'Hilang'];

        $statusBarangs = [];

        // Loop untuk setiap barang
        for ($i = 1; $i <= $totalBarangs; $i++) {
            $statusBarangs[] = [
                'barang_id'  => $i,
                'status'     => $listStatus[array_rand($listStatus)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('status_barangs')->insert($statusBarangs);
    }
}
