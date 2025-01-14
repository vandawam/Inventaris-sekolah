<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs');
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal_perabaikan');
            $table->string('harga_perbaikan');
            $table->string('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
