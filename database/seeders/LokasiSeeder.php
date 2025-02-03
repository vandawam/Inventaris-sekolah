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
                'jurusan_id' => 1, 
                'user_id' => 2,    
                'nama' => 'Lab Komputer 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 1, 
                'user_id' => 2,    
                'nama' => 'Lab Komputer 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 1, 
                'user_id' => 2,    
                'nama' => 'Lab Komputer 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            ///////////////////////////////////////////

            [
                'jurusan_id' => 2,
                'user_id' => 2,
                'nama' => 'Bengkel 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 2,
                'user_id' => 2,
                'nama' => 'Bengkel 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 2,
                'user_id' => 2,
                'nama' => 'Ruang Kelas 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            ///////////////////////////////////////////

            [
                'jurusan_id' => 3,
                'user_id' => 3,
                'nama' => 'Lab Teknik Elektro 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 3,
                'user_id' => 3,
                'nama' => 'Ruang Kelas 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 3,
                'user_id' => 3,
                'nama' => 'Ruang Kelas 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            ///////////////////////////////////////////

            [
                'jurusan_id' => 4,
                'user_id' => 4,
                'nama' => 'Bengkel Motor 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 4,
                'user_id' => 4,
                'nama' => 'Bengkel Motor 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 4,
                'user_id' => 4,
                'nama' => 'Toko Sparepart Motor',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            /////////////////////

            [
                'jurusan_id' => 5,
                'user_id' => 5,
                'nama' => 'Aula',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 5,
                'user_id' => 5,
                'nama' => 'Ruang Musik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jurusan_id' => 5,
                'user_id' => 5,
                'nama' => 'Ruang Olahraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('lokasis')->insert($lokasis);
    }
}
