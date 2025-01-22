<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            ['nama' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sistem Informasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Elektro', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Mesin', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Sipil', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('jurusans')->insert($jurusans);
    }
}
