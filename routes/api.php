<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//rutas publicas

Route::post('register', [App\Http\Controllers\Api\RegisterController::class, 'register']);//registro de usuarios
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);// login de usuarios

Route::get('/books', [App\Http\Controllers\Api\BookController::class, 'index']);//mostrar books

Route::get('/books/{book}', [App\Http\Controllers\Api\BookController::class, 'show']);//mostrar books

//rutas privadas
    Route::get('logout', [App\Http\Controllers\Api\LoginController::class, 'logout']);

    Route::post('/books/crear', [App\Http\Controllers\Api\BookController::class, 'store']);// para crear

    Route::put('/books/update/{books}', [App\Http\Controllers\Api\BookController::class, 'update']);//actualizar

    Route::delete('/books/delete/{books}', [App\Http\Controllers\Api\BookController::class, 'destroy']);//eliminar

    //providers

Route::get('/providers/{providers}', [App\Http\Controllers\Api\ProviderController::class, 'show']);//mostrar books

Route::get('/providers', [App\Http\Controllers\Api\ProviderController::class, 'index']);//mostrar books

Route::post('/providers/crear', [App\Http\Controllers\Api\ProviderController::class, 'store']);// para crear

Route::put('/providers/update/{providers}', [App\Http\Controllers\Api\ProviderController::class, 'update']);//actualizar

Route::delete('/providers/delete/{providers}', [App\Http\Controllers\Api\ProviderController::class, 'destroy']);//eliminar






