<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/nama', 'KelasController@tampilnama');
Route::get('/nama/{id_kelas}', [KelasController::class, 'tampilnama']);
Route::post('/daftarhadir', [KelasController::class, 'kehadiran']);
Route::get('/daftarhadir',[DashboardController::class, 'tampilDashboard']);
Route::post('/siswaTerbanyak',[DashboardController::class, 'PengunjungTerbanyak']);



