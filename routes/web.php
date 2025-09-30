<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\profilSekolahController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\admin\userController as AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\operator\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [LoginController::class, 'login'])->name('login');
Route::get('/login',[LoginController::class,'show'])->name('loginShow');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/',[UserController::class,'index'])->name('beranda');
Route::get('/info',[UserController::class,'info'])->name('info');
Route::get('/berita',[UserController::class,'berita'])->name('berita');
Route::get('/galeri',[UserController::class,'galeri'])->name('galeri');
Route::get('/ekskul',[UserController::class,'ekskul'])->name('ekskul');
Route::get('/profil',[UserController::class,'ekskul'])->name('ekskul');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dash',[AdminController::class,'dash'])->name('admin.dash');
    Route::get('/admin/profil',[AdminController::class,'profil'])->name('admin.profilSek');

    Route::get('/admin/profil/create',[profilSekolahController::class,'create'])->name('admin.profilSek-create');
    Route::post('/admin/profil/store',[profilSekolahController::class,'store'])->name('profilSek-store');
    Route::get('/admin/profil/edit/{id}',[profilSekolahController::class,'edit'])->name('admin.profilSek-edit');
    Route::post('/admin/profil/edit/{id}',[profilSekolahController::class,'update'])->name('admin.profilSek-update');
    Route::get('/admin/profil/delete/{id}',[profilSekolahController::class,'delete'])->name('admin.profilSek-delete');

    Route::get('/admin/guru',[AdminController::class,'guru'])->name('admin.Guru');
    Route::get('/admin/guru/create',[GuruController::class,'create'])->name('admin.Guru-create');
    Route::post('/admin/guru/store',[GuruController::class,'store'])->name('admin.Guru-store');
    Route::get('/admin/guru/edit/{id}',[GuruController::class,'edit'])->name('admin.Guru-edit');
    Route::post('/admin/guru/edit/{id}',[GuruController::class,'update'])->name('admin.Guru-update');
    Route::get('/admin/guru/delete/{id}',[GuruController::class,'destroy'])->name('admin.Guru-delete');

    Route::get('/admin/siswa',[AdminController::class,'siswa'])->name('admin.Siswa');
    Route::get('/admin/siswa/create',[SiswaController::class,'create'])->name('admin.Siswa-create');
    Route::post('/admin/siswa/store',[SiswaController::class,'store'])->name('admin.Siswa-store');
    Route::get('/admin/siswa/edit/{id}',[SiswaController::class,'edit'])->name('admin.Siswa-edit');
    Route::post('/admin/siswa/edit/{id}',[SiswaController::class,'update'])->name('admin.Siswa-update');
    Route::get('/admin/siswa/delete/{id}',[SiswaController::class,'delete'])->name('admin.Siswa-delete');

    Route::get('/admin/berita',[AdminController::class,'berita'])->name('admin.Berita');
    Route::get('/admin/berita/create',[BeritaController::class,'create'])->name('admin.Berita-create');
    Route::post('/admin/berita/store',[BeritaController::class,'store'])->name('admin.Berita-store');
    Route::get('/admin/berita/edit/{id}',[BeritaController::class,'edit'])->name('admin.Berita-edit');
    Route::post('/admin/berita/edit/{id}',[BeritaController::class,'update'])->name('admin.Berita-update');
    Route::get('/admin/berita/delete/{id}',[BeritaController::class,'delete'])->name('admin.Berita-delete');


    Route::get('/admin/ekskul',[AdminController::class,'ekskul'])->name('admin.Ekskul');
    Route::get('/admin/ekskul/create', [EkskulController::class, 'create'])->name('admin.ekskul.create');
    Route::post('/admin/ekskul/store', [EkskulController::class, 'store'])->name('admin.ekskul.store');
    Route::get('/admin/ekskul/edit/{id}', [EkskulController::class, 'edit'])->name('admin.ekskul.edit');
    Route::post('/admin/ekskul/update/{id}', [EkskulController::class, 'update'])->name('admin.ekskul.update');
    Route::get('/admin/ekskul/delete/{id}', [EkskulController::class, 'destroy'])->name('admin.ekskul.delete');

    Route::get('/admin/galeri',[AdminController::class,'galeri'])->name('admin.Galeri');

    Route::get('/admin/user',[AdminController::class,'user'])->name('admin.User');
    Route::get('/admin/user/create', [AdminUserController::class,'create'])->name('admin.User-create');
    Route::post('/admin/user/store', [AdminUserController::class,'store'])->name('admin.User-store');
    Route::get('/admin/user/edit/{id}', [AdminUserController::class,'edit'])->name('admin.User-edit');
    Route::post('/admin/user/edit/{id}', [AdminUserController::class,'update'])->name('admin.User-update');
    Route::get('/admin/user/delete/{id}', [AdminUserController::class,'delete'])->name('admin.User-delete');

});

Route::middleware(['operator'])->group(function (){
    Route::get('/operator',[OperatorController::class,'index'])->name('operator.index');
});

