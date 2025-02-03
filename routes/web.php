<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LokasiController::class, 'index'])->name('Lokasi');
Route::get('/barang', [BarangController::class, 'index'])->name('Barang');
Route::get('/jurusan', [JurusanController::class, 'index'])->name('Jurusan');

Route::middleware('petugas')->group(function () {
    Route::get('/jurusan/{id}', [JurusanController::class, 'show'])
        ->name('Jurusan.show');

    Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])
        ->name('Jurusan.edit');

    Route::put('/jurusan/{id}', [JurusanController::class, 'update'])
        ->name('Jurusan.update');

    Route::post('/jurusan/{id}', [JurusanController::class, 'destroy'])
        ->name('Jurusan.destroy');
});

Route::middleware('petugas')->group(function () {
    Route::get('/barang/{id}', [BarangController::class, 'show'])
        ->name('Barang.show');

    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])
        ->name('Barang.edit');

    Route::post('/barang/{id}', [BarangController::class, 'update'])
        ->name('Barang.update');

    Route::post('/barangd/{id}', [BarangController::class, 'destroy'])
        ->name('Barang.destroy');

    Route::post('/status/{id}', [BarangController::class, 'status'])->name('barang.status');
});

Route::middleware('petugas')->group(function () {
    Route::get('/lokasi/{id}', [LokasiController::class, 'show'])
        ->name('Lokasi.show');

    Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])
        ->name('Lokasi.edit');

    Route::post('/lokasi/{id}', [LokasiController::class, 'update'])
        ->name('Lokasi.update');

    Route::post('/lokasid/{id}', [LokasiController::class, 'destroy'])
        ->name('Lokasi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/Riwayat/{id}', [RiwayatController::class, 'show'])
        ->name('Riwayat.show');

    Route::get('/Riwayat/{id}/edit', [RiwayatController::class, 'edit'])
        ->name('Riwayat.edit');
        
    Route::post('/Riwayat', [RiwayatController::class, 'store'])
        ->name('Riwayat.store');

    Route::post('/Riwayat/{id}', [RiwayatController::class, 'update'])
        ->name('Riwayat.update');

    Route::post('/Riwayatd/{id}', [RiwayatController::class, 'destroy'])
        ->name('Riwayat.destroy');
});

Route::middleware('teknisi')->controller(App\Http\Controllers\TeknisiController::class)->prefix('teknisi')->name('teknisi.')->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('/saya', 'saya')->name('saya');
    Route::get('/detail/{id}', 'detail')->name('detail');
    Route::get('/riwayat/{id}', 'riwayat')->name('riwayat');
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/ruangan', [AdminController::class, 'ruangan'])->name('ruangan');
        Route::get('/ruangan/{id}', [AdminController::class, 'ruangan_show'])->name('ruangan.show');
        Route::get('/barang', [AdminController::class, 'barang'])->name('barang');
        Route::get('/barang/{id}', [AdminController::class, 'barang_show'])->name('barang.show');
        Route::get('/jurusan', [AdminController::class, 'jurusan'])->name('jurusan');
        Route::get('/jurusan/{id}', [AdminController::class, 'jurusan_show'])->name('jurusan.show');
        Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
        Route::get('/riwayat/{id}', [AdminController::class, 'riwayat'])->name('riwayat');

        Route::post('/tambah_akun', [AdminController::class, 'tambah_akun'])->name('tambah_akun');
        Route::post('/edit_akun/{id}', [AdminController::class, 'edit_akun'])->name('edit_akun');
        Route::get('/delete_akun/{id}', [AdminController::class, 'delete_akun'])->name('delete_akun');

        Route::post('/lokasicreate', [AdminController::class, 'lokasicreate'])->name('lokasicreate');
        Route::post('/barangcreate', [AdminController::class, 'barangcreate'])->name('barangcreate');
        Route::post('/jurusancreate', [AdminController::class, 'jurusancreate'])->name('jurusancreate');
        Route::post('/jurusanupdate/{id}', [AdminController::class, 'jurusanupdate'])->name('jurusanupdate');

});
