<?php

use App\Http\Controllers\DuplaTombstoneController;
use App\Http\Controllers\SzimplaTombstoneController;
use App\Http\Controllers\UrnaTombstoneController;
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

Route::apiResource('urna_tombstones', UrnaTombstoneController::class);
Route::apiResource('szimpla_tombstones', SzimplaTombstoneController::class);
Route::apiResource('dupla_tombstones', DuplaTombstoneController::class);
