<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\SewaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// return view('welcome');
// });
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::get('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/lapangan/add', [LapanganController::class, 'create'])->name('lapangan.create');
Route::post('/lapangan/store', [LapanganController::class, 'store'])->name('lapangan.store');
Route::get('/lapangan', [LapanganController::class, 'index'])->name('lapangan.index');
Route::get('/lapangan/edit/{id}', [LapanganController::class, 'edit'])->name('lapangan.edit');
Route::post('/lapangan/update/{id}', [LapanganController::class, 'update'])->name('lapangan.update');
Route::post('/lapangan/delete/{id}', [LapanganController::class, 'delete'])->name('lapangan.delete');
Route::get('/lapangan/search', [LapanganController::class, 'search'])->name('lapangan.search');

Route::get('/penyewa/add', [penyewaController::class, 'create'])->name('penyewa.create');
Route::post('/penyewa/store', [penyewaController::class, 'store'])->name('penyewa.store');
Route::get('/penyewa', [penyewaController::class, 'index'])->name('penyewa.index');
Route::get('/penyewa/edit/{id}', [penyewaController::class, 'edit'])->name('penyewa.edit');
Route::post('/penyewa/update/{id}', [penyewaController::class, 'update'])->name('penyewa.update');
Route::post('/penyewa/delete/{id}', [penyewaController::class, 'delete'])->name('penyewa.delete');
Route::get('/penyewa/trash', [PenyewaController::class, 'trash'])->name('penyewa.trash');
Route::get('/penyewa/hide/{id}', [PenyewaController::class, 'hide'])->name('penyewa.hide');
Route::get('/penyewa/search', [PenyewaController::class, 'search'])->name('penyewa.search');
Route::get('/penyewa/restore/{id}', [PenyewaController::class, 'restore'])->name('penyewa.restore');
Route::get('/penyewa/search/trash', [PenyewaController::class, 'search_trash'])->name('penyewa.search_trash');

Route::get('add', [sewaController::class, 'create'])->name('sewa.create');
Route::post('store', [sewaController::class, 'store'])->name('sewa.store');
Route::get('/', [sewaController::class, 'index'])->name('sewa.index');
Route::get('edit/{id}', [sewaController::class, 'edit'])->name('sewa.edit');
Route::post('update/{id}', [sewaController::class, 'update'])->name('sewa.update');
Route::post('delete/{id}', [sewaController::class, 'delete'])->name('sewa.delete');