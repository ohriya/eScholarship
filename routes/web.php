<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Auth::routes();
Route::view('/adminHome', 'adminHome')->name('adminHome')->middleware('auth','studentMiddleware');
Route::resource('profile', ProfileController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/apply', [App\Http\Controllers\ProfileController::class, 'apply']);

Route::get('/users', [App\Http\Controllers\AdminController::class, 'showUsers']);
Route::get('/user/{user_id}', [App\Http\Controllers\AdminController::class, 'showOneUser']);
Route::get('/applied/users', [App\Http\Controllers\AdminController::class, 'showApplicants']);
Route::post('/scholarship/filter', [App\Http\Controllers\AdminController::class, 'filter']);
Route::get('/winners', [App\Http\Controllers\AdminController::class, 'showWinners']);


Route::get('/payment-verify', [App\Http\Controllers\PaymentVerificationController::class, 'verify']);
