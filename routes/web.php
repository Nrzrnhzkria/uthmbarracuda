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

Route::get('/', function () {
    return view('index');
});

Route::get('/registration-form', [\App\Http\Controllers\Admin\RegistrationController::class, 'index']);
Route::post('/store-form', [\App\Http\Controllers\Admin\RegistrationController::class, 'store']);
Route::get('/registration-success', [\App\Http\Controllers\Admin\RegistrationController::class, 'success']);

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'dashboard'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

