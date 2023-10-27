<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatesController;
use App\Http\Controllers\UsersController;


Route::get('/', [DatesController::class, 'index']);
Route::get('/create', [DatesController::class, 'searchUser'])->name('created');
Route::post('/create', [DatesController::class, 'searchUser'])->name('created-post');

Route::put('/create/{user_id}', [DatesController::class, 'updateDate'])
    ->middleware('token-auth')
    ->name('update-date');

Route::delete('/create/{user_id}', [DatesController::class, 'deleteDate'])
    ->middleware('token-auth')
    ->name('delete-date');







