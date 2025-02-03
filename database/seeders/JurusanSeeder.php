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
            ['nama' => 'Rekayasa Perangkat Lunak', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Mesin', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Elektronika', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Teknik Sepeda Motor', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Umum', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('jurusans')->insert($jurusans);
    }
}
