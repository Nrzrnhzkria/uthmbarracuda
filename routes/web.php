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

// main page
Route::get('/registration-form', [\App\Http\Controllers\RegistrationController::class, 'index']);
Route::post('/store-form', [\App\Http\Controllers\RegistrationController::class, 'store']);
Route::get('/registration-success', [\App\Http\Controllers\RegistrationController::class, 'success']);

// admin panel
Auth::routes();
Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);
// athletes
Route::get('/all-athletes', [\App\Http\Controllers\Admin\AthleteController::class, 'all']);
Route::get('/active-athletes', [\App\Http\Controllers\Admin\AthleteController::class, 'active']);
Route::get('/high-performance-athletes', [\App\Http\Controllers\Admin\AthleteController::class, 'high_performance']);
Route::get('/view-athlete/{user_id}', [\App\Http\Controllers\Admin\AthleteController::class, 'view_details']);
Route::post('/update-athlete/{user_id}', [\App\Http\Controllers\Admin\AthleteController::class, 'update_details']);
Route::get('/delete-athlete/{user_id}', [\App\Http\Controllers\Admin\AthleteController::class, 'destroy']);
// tests
Route::get('/manage-test', [\App\Http\Controllers\Admin\TestController::class, 'manage']);
Route::post('/store-test', [\App\Http\Controllers\Admin\TestController::class, 'store_test']);
Route::get('/test-results', [\App\Http\Controllers\Admin\TestController::class, 'results']);
Route::get('/delete-test/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'destroy']);


