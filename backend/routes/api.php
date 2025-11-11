<?php

use App\Http\Controllers\AccessoriseController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\TombstoneController;
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

Route::apiResource('tombstones', TombstoneController::class);
Route::apiResource('accessories', AccessoryController::class);
Route::apiResource('architectures', ArchitectureController::class);
