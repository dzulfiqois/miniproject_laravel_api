<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\RecordController;
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

// Route::get('/buku', [\App\Http\Controllers\BukuController::class, 'index']);

Route::apiResource('buku', BukuController::class);
// Route::delete('buku/delete/{judul_buku}', BukuController::class, 'delete');
Route::apiResource('pustakawan', PustakawanController::class);
Route::apiResource('record', RecordController::class);
