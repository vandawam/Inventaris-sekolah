<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokasis = [
            [
                'jurusan_id' => 1, // ID jurusan, sesuaikan dengan data di tabel jurusans
                'user_id' => 2,    // ID user, sesuaikan dengan data di tabel users
                'nama' => 'Lab Komputer 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 2,
                'user_id' => 2,
                'nama' => 'Lab Komputer 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 3,
                'user_id' => 3,
                'nama' => 'Ruang Teknik Elektro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 4,
                'user_id' => 4,
                'nama' => 'Bengkel Teknik Mesin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 5,
                'user_id' => 5,
                'nama' => 'Studio Teknik Sipil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('lokasis')->insert($lokasis);
    }
}
