<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatesController;
use App\Http\Controllers\UsersController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', DatesController::class);

Route::get('/create', [DatesController::class, 'searchUser'])->name('created');
Route::post('/create', [DatesController::class, 'searchUser'])->name('created');


// Route::get('/create',[UsersController::class, 'searchUser'])->name('created');
// Route::post('/create','DatesController@searchUser');
// Route::apiResource('/products', ProductosController::class);

// Route::namespace('Admin')->group(function () {
//     Route::resource('/usuarios',UsuariosController::class);
//     // Route::post('/usuarios', [UsuariosController::class, 'crearUsuario']);
//     Route::post('/usuarios/create', 'UsuariosController@create')->name('usuarios.create');
//     Route::get('/usuarios/{id}/edit', 'UsuariosController@edit')->name('usuarios.edit');
//     Route::get('/crear-usuario', [UsuariosController::class, 'mostrarCrearUsuario'])->name('crear-usuario');

// });

// Route::resource('/usuarios', UsuariosController::class);
// // Route::post('/usuarios', [UsuariosController::class, 'crearUsuario']);
// Route::post('/usuarios/creates', 'UsuariosController@create')->name('usuarios.creates');
// Route::get('/usuarios/{id}/edits', 'UsuariosController@edit')->name('usuarios.edits');

// // Route::get('/usuarios/{{id}}/edit', 'UsuariosController@edit')->name('usuarios.edit');
// // Route::put('/usuarios/update/{{id}}', 'UsuariosController@update')->name('usuarios.update');

// Route::get('/crear-usuario', [UsuariosController::class, 'mostrarCrearUsuario'])->name('crear-usuario');


