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
        $totalBarangs = 45;

        $listStatus = ['Baik', 'Rusak', 'Hilang'];

        $statusBarangs = [];

        for ($i = 1; $i <= $totalBarangs; $i++) {
            
            $status = $listStatus[($i - 1) % count($listStatus)];

            $statusBarangs[] = [
                'barang_id'  => $i,
                'status'     => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('status_barangs')->insert($statusBarangs);
    }
}
