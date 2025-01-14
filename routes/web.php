<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'ruang'])->name('Ruang');
Route::get('/barang', [PageController::class, 'barang'])->name('Barang');


Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/ruangan', [AdminController::class, 'ruangan'])->name('ruangan');
        Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
        Route::post('/tambah_akun', [AdminController::class, 'tambah_akun'])->name('tambah_akun');
        Route::post('/edit_akun/{id}', [AdminController::class, 'edit_akun'])->name('edit_akun');
        Route::get('/delete_akun/{id}', [AdminController::class, 'delete_akun'])->name('delete_akun');
});
