<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Login & Rggister
Auth::routes();

Route::middleware(['auth'])->group(function () {
// CRUD Kategori
Route::controller(KategoriController::class)->group(function() {
    Route::get('/kategori','index');
    Route::post('/kategori','store')->name('kategori.store');
    Route::get('/kategori-edit/{id}','edit')->name('kategori.edit');
    Route::put('/kategori-edit/{id}','update')->name('kategori.update');
    Route::delete('kategori/{id}', 'destroy')->name('kategori.delete');
});
// CRUD Berita
Route::controller(BeritaController::class)->group(function() {
    Route::get('/berita','index');
    Route::get('/berita-create','create');
    Route::post('/berita-create','store')->name('berita.store');
    Route::get('/berita-edit/{id}','edit')->name('berita.edit');
    Route::put('/berita-edit/{id}','update')->name('berita.update');;
    Route::delete('berita/{id}', 'destroy')->name('berita.delete');
});
});

// Halaman Berita
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('app');
    Route::get('/{id}', 'detail')->name('detail');
});