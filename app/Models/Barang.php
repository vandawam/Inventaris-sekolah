<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'jurusan_id',
        'lokasi_id',
        'user_id',
        'nama',
        'kategori',
        'spesifikasi',
        'sumber_dana',
        'nilai',
        'tanggal_beli',
    ];

    /**
     * Relasi Many-to-One ke Jurusan:
     * Setiap barang diasosiasikan dengan satu jurusan
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Relasi Many-to-One ke Lokasi:
     * Setiap barang berada pada satu lokasi tertentu
     */
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    /**
     * Relasi Many-to-One ke User:
     * Misalnya, user yang mendaftarkan atau bertanggung jawab atas barang
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi One-to-Many ke StatusBarang:
     * Satu barang bisa memiliki beberapa status (riwayat status)
     */
    public function statusBarangs()
    {
        return $this->hasOne(StatusBarang::class);
    }

    /**
     * Relasi One-to-Many ke RiwayatPerbaikan:
     * Satu barang bisa memiliki banyak riwayat perbaikan
     */
    public function riwayatPerbaikans()
    {
        return $this->hasMany(RiwayatPerbaikan::class);
    }
}
