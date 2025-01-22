<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasis';

    protected $fillable = [
        'jurusan_id',
        'user_id',
        'nama',
    ];

    /**
     * Relasi Many-to-One ke Jurusan:
     * Setiap lokasi dimiliki/diasosiasikan dengan satu jurusan
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    /**
     * Relasi Many-to-One ke User:
     * Setiap lokasi bisa dikelola oleh satu user (misalnya petugas)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi One-to-Many ke Barang:
     * Satu lokasi dapat memiliki banyak barang
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
