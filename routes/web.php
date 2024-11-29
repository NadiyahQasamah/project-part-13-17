<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', Controllers\HomeController::class);
Route::get('/about-us', [Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [Controllers\ContactController::class, 'index']);
Route::get('/gallery', [Controllers\GalleryController::class, 'index']);


Route::resource('users', Controllers\UserController::class)->middleware('auth');

Route::get('login',[Controllers\LoginController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('login',[Controllers\LoginController::class, 'authenticate'])->middleware('guest');

Route::post('logout', Controllers\LogoutController::class)->name('logout')->middleware('auth');
//Route::get('/users', [Controllers\UserController::class, 'index'])->name('users.index');
//Route::get('/users/create', [Controllers\UserController::class, 'create'])->name('users.create');
//Route::post('/users', [Controllers\UserController::class, 'store'])->name('users.store');
//Route::get('/users/{user:id}', [Controllers\UserController::class, 'show'])->name('users.show');
//Route::get('/users/{user:id}/edit', [Controllers\UserController::class, 'edit'])->name('users.edit');
//Route::put('/users/{user:id}', [Controllers\UserController::class, 'update'])->name('users.update');
//Route::delete('/users/{user:id}', [Controllers\UserController::class, 'destroy'])->name('users.destroy'); 