<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;

// use App\Http\Controllers\KamarController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/registrasi', function () {
    return view('admin.registrasi');
});
 
//form registrasi
Route::get('/admin/registrasi', [AuthController::class, 'showRegister']);//menampilkan form registrasi
Route::post('/admin/registrasi', [AuthController::class, 'register']);//menyimpan data dari form

//form login
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');//menampilkan form login
Route::post('/admin/login', [AuthController::class, 'login']);//proses authentifikasi

//logout
Route::get('/admin/logout', [AuthController::class, 'logout'])->middleware('auth:admin');

//dashboard
Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->middleware('auth:admin'); //middleware untuk proteksi route

//admin
Route::get('/admin/dataAdmin', [AdminController::class, 'index'])->name('admin.index');

//update data admin
Route::get('/admin/update/{id}',[AdminController::class, 'update'])->name('admin.update');
Route::put('/admin/update/{id}',[AdminController::class, 'update'])->name('admin.update');

//hapus data admin
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);

//data kamar
Route::get('/kamar/dataKamar', [KamarController::class, 'index'])->name('kamar');
//edit data kamar
Route::put('kamar/update/{id}', [KamarController::class. 'update'])->name('kamar.update');
//tambah data kamar
Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
//hapus data kamar
Route::delete('/kamar/delete/{id}', [KamarController::class, 'destroy']);

//data reservasi
Route::get('/reservasi/dataReservasi', [ReservasiController::class, 'index'])->name('reservasi');
