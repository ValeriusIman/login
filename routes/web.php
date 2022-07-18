<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('/login');
Route::post('/singin', [\App\Http\Controllers\Auth\AuthController::class, 'doLogin']);
Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('/logout');

Route::group(['middleware' => ['app_auth']], static function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

#user
    Route::get('user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('json', [\App\Http\Controllers\UserController::class, 'dataJson']);
    Route::get('user/create', [\App\Http\Controllers\UserController::class, 'create']);
    Route::post('user', [\App\Http\Controllers\UserController::class, 'store']);
    Route::post('validation', [\App\Http\Controllers\UserController::class, 'cekEmail']);
    Route::get('user/{id}/show', [\App\Http\Controllers\UserController::class, 'show']);
    Route::post('user/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::get('user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit']);
    Route::get('user/{id}/delete', [\App\Http\Controllers\UserController::class, 'destroy']);

});
