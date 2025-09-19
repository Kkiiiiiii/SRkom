<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profilSekolahController;
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
Route::get('/admin/profil',[AdminController::class,'profil'])->name('admin.profilSek');
Route::get('/admin/profil/create',[profilSekolahController::class,'create'])->name('admin.profilSek-create');
Route::post('/admin/profil/store',[profilSekolahController::class,'store'])->name('profilSek-store');
Route::get('/admin/profil/delete{id}',[profilSekolahController::class,'delete'])->name('admin.profilSek-delete');
Route::get('/admin/profil/edit{id}',[profilSekolahController::class,'edit'])->name('admin.profilSek-edit');
Route::post('/admin/profil/edit{id}',[profilSekolahController::class,'update'])->name('admin.profilSek-update');

Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.Guru');
Route::get('/admin/guru/create',[GuruController::class,'create'])->name('admin.Guru-create');
Route::post('/admin/guru/store',[GuruController::class,'store'])->name('admin.Guru-store');
Route::get('/admin/guru/delete{id}',[GuruController::class,'.'])->name('admin.Guru-delete');

Route::get('/admin/user',[AdminController::class,'user'])->name('admin.User');
Route::get('/admin/siswa',[AdminController::class,'siswa'])->name('admin.Siswa');
// Route::middleware('admin')->group(function () {

// });
