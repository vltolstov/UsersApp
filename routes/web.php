<?php

use App\Http\Controllers\Auth\ForgotUserPasswordController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/registration', [RegistrationUserController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationUserController::class, 'store'])->name('registration_process');
Route::get('/registration-success', function () {
    return view('auth.registration-success');
})->name('registration-success');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login_process');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [ForgotUserPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password', [ForgotUserPasswordController::class, 'changePassword'])->name(
    'forgot-password-process'
);

Route::resource('/users', UserController::class)
    ->only(['edit', 'update', 'destroy'])
    ->middleware('auth');




