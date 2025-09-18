<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[UserController::class,'index'])->name('beranda');
Route::get('/info',[UserController::class,'info'])->name('info');
Route::get('/berita',[UserController::class,'berita'])->name('berita');
Route::get('/galeri',[UserController::class,'galeri'])->name('galeri');
Route::get('/ekskul',[UserController::class,'ekskul'])->name('ekskul');

Route::get('/login',[LoginController::class,'show'])->name('loginShow');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/dash',[AdminController::class,'dash'])->name('admin.dash');

// Route::middleware('admin')->group(function () {

// });
