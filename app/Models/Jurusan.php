<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'nama',
    ];

    /**
     * Relasi One-to-Many ke Lokasi:
     * Satu jurusan memiliki banyak lokasi
     */
    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }

    /**
     * Relasi One-to-Many ke Barang:
     * Satu jurusan memiliki banyak barang
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
