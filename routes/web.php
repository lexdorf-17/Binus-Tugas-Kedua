<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VideoController;


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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/refresh-captcha', 'Auth\LoginController@refreshCaptcha')->name('refresh_captcha');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/master', [MasterController::class, 'index'])->name('master.index');
Route::get('/master/create', [MasterController::class, 'create'])->name('master.create');
Route::post('/master', [MasterController::class, 'store'])->name('master.store');
Route::get('/master/{id}/edit', [MasterController::class, 'edit'])->name('master.edit');
Route::put('/master/{id}', [MasterController::class, 'update'])->name('master.update');
Route::delete('/master/{id}', [MasterController::class, 'destroy'])->name('master.destroy');


Route::get('/videos', [VideoController::class, 'index'])->name('video.index');
Route::get('/videos/create', [VideoController::class, 'create'])->name('video.create');
Route::post('/videos', [VideoController::class, 'store'])->name('video.store');
Route::get('/videos/{id}', [VideoController::class, 'show'])->name('video.show');
Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('video.update');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

