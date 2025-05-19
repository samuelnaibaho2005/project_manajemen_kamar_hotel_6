<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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
Route::get('/admin/login', [AuthController::class, 'showLogin']);//menampilkan form login
Route::post('/admin/login', [AuthController::class, 'login']);//proses authentifikasi

//logout
Route::get('/admin/logout', [AuthController::class, 'logout'])->middleware('auth:admin');

//dashboard
Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->middleware('auth:admin'); //middleware untuk proteksi route

//admin
Route::get('/admin/dataAdmin', [AdminController::class, 'index'])->name('admin.index');