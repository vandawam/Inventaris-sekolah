<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerbaikan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_perbaikans';

    protected $fillable = [
        'barang_id',
        'user_id',
        'tanggal_perabaikan',
        'harga_perbaikan',
        'status',
    ];

    /**
     * Relasi Many-to-One ke Barang:
     * Setiap riwayat perbaikan terkait dengan satu barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    /**
     * Relasi Many-to-One ke User:
     * User yang menginput / bertanggung jawab terhadap riwayat perbaikan
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
