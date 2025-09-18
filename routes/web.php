<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('beranda');
Route::get('/info',[UserController::class,'info'])->name('info');
Route::get('/berita',[UserController::class,'berita'])->name('berita');
Route::get('/galeri',[UserController::class,'galeri'])->name('galeri');
Route::get('/ekskul',[UserController::class,'ekskul'])->name('ekskul');
