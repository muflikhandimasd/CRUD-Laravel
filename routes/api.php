<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\PembelianController;

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

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/{id}', [SiswaController::class, 'show']);
Route::post('/siswa', [SiswaController::class, 'create']);
Route::put('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
Route::post('/barangs', [PembelianController::class, 'createBarang']);
