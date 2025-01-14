<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id', 'nama', 'kategori', 'status', 'detail'
    ];

    // Hook to generate the code
    // protected static function booted()
    // {
    //     static::creating(function ($barang) {
    //         $year = date('Y');
    //         $ruanganId = str_pad($barang->ruangan_id, 2, '0', STR_PAD_LEFT); // Ensures 2 digits
    //         $lastBarang = self::where('ruangan_id', $barang->ruangan_id)
    //                           ->orderBy('id', 'desc')
    //                           ->first();

    //         $nextNumber = $lastBarang ? ((int)substr($lastBarang->code, -3)) + 1 : 1;
    //         $nextNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Ensures 3 digits

    //         $barang->code = $year . $ruanganId . $nextNumber;
    //     });
    // }

}
