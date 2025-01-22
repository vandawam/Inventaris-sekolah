<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBarang extends Model
{
    use HasFactory;

    protected $table = 'status_barangs';

    protected $fillable = [
        'barang_id',
        'status',
    ];

    /**
     * Relasi Many-to-One ke Barang:
     * StatusBarang dimiliki oleh satu barang
     */
    public function barang()
    {
        return $this->hasOne(Barang::class);
    }
}
