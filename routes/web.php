<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmailController;
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
	Route::post('/', [GuestController::class, 'login'])->name('login');
	Route::get('/password-reset', [GuestController::class, 'reset'])->name('reset');
	Route::get('/register', [GuestController::class, 'register'])->name('register');
	Route::post('/register', [EmailController::class, 'postRegister'])->name('register.post');
	Route::get('/verify-account', [EmailController::class, 'verifyAccount'])->name('verify-account');
	Route::post('/password-reset', [EmailController::class, 'postPasswordChange'])->name('password-reset.post');
	Route::get('/new-password', [EmailController::class, 'newPassword'])->name('new-password');
	Route::post('/new-password', [EmailController::class, 'postNewPassword'])->name('new-password.post');
});

Route::middleware('auth')->group(function () {
	Route::get('/worldwide', [UsersController::class, 'worldwide'])->name('worldwide');
	Route::get('/by-country', [UsersController::class, 'byCountry'])->name('by-country');
	Route::get('/country/sort', [UsersController::class, 'sort'])->name('sort');
	Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});
