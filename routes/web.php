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
Route::get('/view-performance/{user_id}', [\App\Http\Controllers\Admin\AthleteController::class, 'view_performance']);
// tests
Route::get('/manage-test', [\App\Http\Controllers\Admin\TestController::class, 'manage']);
Route::post('/store-test', [\App\Http\Controllers\Admin\TestController::class, 'store_test']);
Route::get('/delete-test/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'destroy']);
Route::get('/test-form/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'test_form']);
Route::post('/store-result/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'store_result']);
// results
Route::get('/view-results/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'results']);
Route::get('/result-pdf/{test_id}', [\App\Http\Controllers\Admin\TestController::class, 'generate_PDF']);
Route::get('/delete-result/{result_id}', [\App\Http\Controllers\Admin\TestController::class, 'destroy_result']);
// administrator
Route::get('/administrator', [\App\Http\Controllers\Admin\AdminController::class, 'view']);
Route::post('/store-admin', [\App\Http\Controllers\Admin\AdminController::class, 'store_admin']);
Route::post('/remove-admin', [\App\Http\Controllers\Admin\AdminController::class, 'remove_admin']);
// files
Route::get('/files', [\App\Http\Controllers\Admin\FileController::class, 'view']);
Route::post('/store-file', [\App\Http\Controllers\Admin\FileController::class, 'store_file']);
Route::get('/delete-file/{file_id}', [\App\Http\Controllers\Admin\FileController::class, 'destroy']);



