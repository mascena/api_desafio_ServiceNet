<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
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


Route::prefix('v1')->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/', [UserController::class, 'index']);

        Route::post('/store', [UserController::class, 'store']);

        Route::get('/show/{id}', [UserController::class, 'show']);

        Route::put('/update/{id}', [UserController::class, 'update']);

        Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
    });
});
