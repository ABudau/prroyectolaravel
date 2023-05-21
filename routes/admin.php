<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AuthorController;


Route::get('categoria/pdf', [CategoryController::class, 'exportPdf'])->name('categoria.pdf');

Route::get('/panel',[HomeController::class,'index']);
Route::get('/admin',[HomeController::class,'index']);
Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::get('/logout', [LogoutController::class,'logout'])->name('logout');
Route::post('/logout', [LogoutController::class,'logout'])->name('logout');


