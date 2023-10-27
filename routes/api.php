<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatesController;

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
// Route::middleware('api')->group(function () {
    // Tus rutas de API aquí
    Route::get('/dates', [DatesController::class, 'getDates']);
    Route::post('/dates', [DatesController::class, 'postDate']);
    Route::put('/create/{user_id}', [DatesController::class, 'updateDateApi'])
        ->middleware('token-auth')
        ->name('update-date-api');
    Route::delete('/create/{user_id}', [DatesController::class, 'deleteDate'])
        ->middleware('token-auth')
        ->name('delete-date-api');

    Route::get('/create', [DatesController::class, 'getToken']);
// });
