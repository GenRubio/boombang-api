<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Packets\PacketsController;
use App\Http\Controllers\Api\v1\Sceneries\SceneriesController;
use App\Http\Controllers\Api\v1\Sceneries\PublicScenery\PublicSceneriesController;
use App\Http\Controllers\Api\v1\Sceneries\PrivateScenery\PrivateSceneriesController;

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

Route::group([
    'prefix' => 'v1',
], function () {
    Route::get('packets', [PacketsController::class, 'get']);

    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::prefix('sceneries')->group(function () {
        Route::get('/', [SceneriesController::class, 'getAll']);
        Route::prefix('publics')->group(function () {
            Route::get('/', [PublicSceneriesController::class, 'getAll']);
        });
        Route::prefix('privates')->group(function () {
            Route::get('/', [PrivateSceneriesController::class, 'getAll']);
        });
    });
});
