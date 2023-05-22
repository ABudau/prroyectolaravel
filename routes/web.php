<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CookieController;
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


Route::get('/', [CookieController::class, 'showHome']);
Route::get('/set-cookie', [CookieController::class, 'setCookie']);
Route::get('/get-cookie', [CookieController::class, 'getCookie']);
Route::get('/delete-cookie', [CookieController::class, 'deleteCookie']);

Route::get('/register',[RegisterController::class,'show']);
Route::post('/register',[RegisterController::class,'register']);

Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/home',[HomeController::class,'index']);

Route::get('/logout', [LogoutController::class,'logout'])->name('logout');
