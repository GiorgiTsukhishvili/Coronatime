<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UsersController;
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

Route::middleware('guest')->group(function () {
	Route::get('/', [GuestController::class, 'index'])->name('login');
	Route::get('/passowrd-reset', [GuestController::class, 'reset'])->name('reset');
	Route::get('/register', [GuestController::class, 'register'])->name('register');
});

Route::get('/worldwide', [UsersController::class, 'worldwide'])->name('worldwide');

Route::get('/by-country', [UsersController::class, 'byCountry'])->name('by-country');
