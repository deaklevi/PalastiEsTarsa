<?php

use App\Http\Controllers\AccessoriseController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\AuthController;
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
// --- PUBLIKUS ÚTVONALAK (Mindenki látja) ---
Route::apiResource('tombstones', TombstoneController::class)->only(['index', 'show']);
Route::apiResource('accessories', AccessoryController::class)->only(['index', 'show']);
Route::apiResource('architectures', ArchitectureController::class)->only(['index', 'show']);
Route::apiResource('works', WorkController::class)->only(['index', 'show']);
Route::apiResource('stones', StoneController::class)->only(['index', 'show']);

Route::post('/send-contact', [ContactController::class, 'send']);
Route::post('/send-offer', [ContactController::class, 'sendOffer']);
Route::post('/login', [AuthController::class, 'login']);

// --- VÉDETT ÚTVONALAK (Csak bejelentkezett adminnak) ---
Route::middleware('auth:sanctum')->group(function () {
    
    // 2FA ellenőrzés
    Route::post('/verify-2fa', [AuthController::class, 'verify2FA']);
    
    // Itt érhető el a teljes szerkesztési jog (POST, PUT, DELETE)
    // A prefix segít megkülönböztetni az admin hívásokat a sima listázástól
    Route::prefix('admin')->group(function () {
        Route::apiResource('tombstones', TombstoneController::class)->except(['index', 'show']);
        Route::apiResource('accessories', AccessoryController::class)->except(['index', 'show']);
        Route::apiResource('architectures', ArchitectureController::class)->except(['index', 'show']);
        Route::apiResource('works', WorkController::class)->except(['index', 'show']);
        Route::apiResource('stones', StoneController::class)->except(['index', 'show']);
        
        Route::get('/protected-data', function () {
            return response()->json(['message' => 'Sikeresen bent vagy az admin zónában!']);
        });
    });
});