<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Model\KelasModel;

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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'Pengunjung']);
    Route::get('/dashboard/ranking', [DashboardController::class, 'PengunjungTerbanyak']);
    Route::post('/dashboard/ranking', [DashboardController::class, 'PengunjungTerbanyak'])->name('siswaterbanyak');
    Route::post('/dashboard/ranking/print', [DashboardController::class, 'CetakPengunjungTerbanyak'])->name('CetakPengunjung');
    // Rute lainnya yang membutuhkan autentikasi
    Route::get('/buku', [BukuController::class, 'view_tampil_buku']);
    Route::post('/buku/update/{id}', [BukuController::class, 'update_buku']);
    Route::delete('/buku/delete/{id}', [BukuController::class, 'delete_buku']);
    Route::post('/buku/tambah',[BukuController::class, 'tambah_buku'])->name('tambah_buku');

});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/', [KelasController::class, 'tampilkelas']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
