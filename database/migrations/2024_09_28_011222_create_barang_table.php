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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');
            $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('kategori');
            $table->string('spesifikasi');
            $table->string('sumber_dana');
            $table->string('nilai');
            $table->string('tanggal_beli');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropForeign(['jurusan_id']);
            $table->dropForeign(['lokasi_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('barangs');
    }
};
