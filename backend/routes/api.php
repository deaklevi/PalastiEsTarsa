<?php

use App\Http\Controllers\AccessoriseController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoneController;
use App\Http\Controllers\TombstoneController;
use App\Http\Controllers\WorkController;
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

Route::apiResource('tombstones', TombstoneController::class)->only(['index']);
Route::apiResource('accessories', AccessoryController::class)->only(['index']);
Route::apiResource('architectures', ArchitectureController::class)->only(['index']);
Route::apiResource('works', WorkController::class)->only(['index']);
Route::apiResource('stones', StoneController::class)->only(['index']);
Route::post('/send-contact', [ContactController::class, 'send']);
Route::post('/send-offer', [ContactController::class, 'sendOffer']);