<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// gunakan model lokasi (dan barang jika perlu)
use App\Models\Lokasi;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data lokasi dari tabel lokasis
        $lokasis = Lokasi::all();

        // Variabel penampung data untuk diinsert ke tabel barangs
        $barangs = [];

        // Kita tentukan berapa barang per lokasi
        $jumlahBarangPerLokasi = 5;

        foreach ($lokasis as $lokasi) {
            // Misalkan kita mau membuat 3 barang per lokasi
            for ($i = 1; $i <= $jumlahBarangPerLokasi; $i++) {
                $barangs[] = [
                    'jurusan_id'   => $lokasi->jurusan_id,
                    'lokasi_id'    => $lokasi->id,
                    'user_id'      => $lokasi->user_id, // Sesuai dengan user_id di lokasi
                    'nama'         => "Barang ke-{$i} - {$lokasi->nama}",
                    'kategori'     => 'Elektronik',
                    'spesifikasi'  => "Spesifikasi Barang ke-{$i} - {$lokasi->nama}",
                    'sumber_dana'  => 'APBN',
                    // Contoh nilai statis atau bisa disesuaikan
                    'nilai'        => 1000000 * $i,
                    // Contoh tanggal beli statis (sesuaikan dengan kebutuhan)
                    'tanggal_beli' => '2024-01-01',
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ];
            }
        }

        // Lakukan insert ke tabel 'barangs' secara massal
        DB::table('barangs')->insert($barangs);
    }
}
