<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\EkskulController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\profilSekolahController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\admin\SiswaController;
use App\Http\Controllers\admin\userController as AdminUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\operator\BeritaController as OperatorBeritaController;
use App\Http\Controllers\operator\EkskulController as OperatorEkskulController;
use App\Http\Controllers\operator\GaleriController as OperatorGaleriController;
use App\Http\Controllers\operator\OperatorController;
use App\Http\Controllers\operator\profilSekolahController as OperatorProfilSekolahController;
use App\Http\Controllers\operator\SiswaController as OperatorSiswaController;
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

// Route Untuk Mengatur role admin
Route::middleware(['auth','admin'])->group(function () {
    
    Route::get('/admin/dash',[AdminController::class,'dash'])->name('admin.dash'); //Untuk Menampilkan halaman dashboard
    
    Route::get('/admin/berita',[BeritaController::class,'index'])->name('admin.Berita');
    Route::get('/admin/berita/create',[BeritaController::class,'create'])->name('admin.Berita-create');
    Route::post('/admin/berita/store',[BeritaController::class,'store'])->name('admin.Berita-store');
    Route::get('/admin/berita/edit/{id}',[BeritaController::class,'edit'])->name('admin.Berita-edit');
    Route::post('/admin/berita/edit/{id}',[BeritaController::class,'update'])->name('admin.Berita-update');
    Route::get('/admin/berita/delete/{id}',[BeritaController::class,'delete'])->name('admin.Berita-delete');

    Route::get('/admin/profil',[profilSekolahController::class,'index'])->name('admin.profilSek');
    Route::get('/admin/profil/create',[profilSekolahController::class,'create'])->name('admin.profilSek-create');
    Route::post('/admin/profil/store',[profilSekolahController::class,'store'])->name('profilSek-store');
    Route::get('/admin/profil/edit/{id}',[profilSekolahController::class,'edit'])->name('admin.profilSek-edit');
    Route::post('/admin/profil/edit/{id}',[profilSekolahController::class,'update'])->name('admin.profilSek-update');
    Route::get('/admin/profil/delete/{id}',[profilSekolahController::class,'delete'])->name('admin.profilSek-delete');

    Route::get('/admin/guru',[GuruController::class,'index'])->name('admin.Guru');
    Route::get('/admin/guru/create',[GuruController::class,'create'])->name('admin.Guru-create');
    Route::post('/admin/guru/store',[GuruController::class,'store'])->name('admin.Guru-store');
    Route::get('/admin/guru/edit/{id}',[GuruController::class,'edit'])->name('admin.Guru-edit');
    Route::post('/admin/guru/edit/{id}',[GuruController::class,'update'])->name('admin.Guru-update');
    Route::get('/admin/guru/delete/{id}',[GuruController::class,'destroy'])->name('admin.Guru-delete');

    Route::get('/admin/siswa',[SiswaController::class,'index'])->name('admin.Siswa');
    Route::get('/admin/siswa/create',[SiswaController::class,'create'])->name('admin.Siswa-create');
    Route::post('/admin/siswa/store',[SiswaController::class,'store'])->name('admin.Siswa-store');
    Route::get('/admin/siswa/edit/{id}',[SiswaController::class,'edit'])->name('admin.Siswa-edit');
    Route::post('/admin/siswa/edit/{id}',[SiswaController::class,'update'])->name('admin.Siswa-update');
    Route::get('/admin/siswa/delete/{id}',[SiswaController::class,'delete'])->name('admin.Siswa-delete');



    Route::get('/admin/ekskul',[EkskulController::class,'index'])->name('admin.Ekskul');
    Route::get('/admin/ekskul/create', [EkskulController::class, 'create'])->name('admin.ekskul.create');
    Route::post('/admin/ekskul/store', [EkskulController::class, 'store'])->name('admin.ekskul.store');
    Route::get('/admin/ekskul/edit/{id}', [EkskulController::class, 'edit'])->name('admin.ekskul.edit');
    Route::post('/admin/ekskul/update/{id}', [EkskulController::class, 'update'])->name('admin.ekskul.update');
    Route::get('/admin/ekskul/delete/{id}', [EkskulController::class, 'delete'])->name('admin.ekskul.delete');

    Route::get('/admin/galeri',[GaleriController::class,'index'])->name('admin.Galeri');
    Route::post('/admin/galeri/store',[GaleriController::class,'store'])->name('admin.Galeri-store');
    Route::get('/admin/galeri/edit/{id}',[GaleriController::class,'edit'])->name('admin.Galeri-edit');
    Route::post('/admin/galeri/edit{id}',[GaleriController::class,'update'])->name('admin.Galeri-update');
    Route::get('/admin/galeri/delete/{id}',[GaleriController::class,'delete'])->name('admin.Galeri-delete');

    Route::get('/admin/user',[AdminUserController::class,'index'])->name('admin.User');
    Route::get('/admin/user/create', [AdminUserController::class,'create'])->name('admin.User-create');
    Route::post('/admin/user/store', [AdminUserController::class,'store'])->name('admin.User-store');
    Route::get('/admin/user/edit/{id}', [AdminUserController::class,'edit'])->name('admin.User-edit');
    Route::post('/admin/user/edit/{id}', [AdminUserController::class,'update'])->name('admin.User-update');
    Route::get('/admin/user/delete/{id}', [AdminUserController::class,'delete'])->name('admin.User-delete');

});

// Route Untuk Mengatur Role Operator
Route::middleware(['auth','operator'])->group(function (){
    Route::get('/operator/index',[OperatorController::class,'index'])->name('operator');//Untuk Menampilkan Halaman dashboard Operator

    Route::get('/operator/berita',[OperatorBeritaController::class,'index'])->name('operator.berita');
    Route::get('/operator/berita/create',[OperatorBeritaController::class,'create'])->name('operator.berita-create');
    Route::post('/operator/berita/store',[OperatorBeritaController::class,'store'])->name('operator.berita-store');
    Route::get('/operator/berita/edit/{id}',[OperatorBeritaController::class,'edit'])->name('operator.berita-edit');
    Route::post('/operator/berita/edit{id}',[OperatorBeritaController::class,'update'])->name('operator.berita-update');
    Route::get('/operator/berita/delete{id}',[OperatorBeritaController::class,'delete'])->name('operator.berita-delete');

    Route::get('/operator/galeri',[OperatorGaleriController::class,'index'])->name('operator.galeri');
    Route::post('/operator/galeri/store',[OperatorGaleriController::class,'store'])->name('operator.Galeri-store');
    Route::get('/operator/galeri/edit/{id}',[OperatorGaleriController::class,'edit'])->name('operator.Galeri-edit');
    Route::post('/operator/galeri/edit{id}',[OperatorGaleriController::class,'update'])->name('operator.Galeri-update');
    Route::get('/operator/galeri/delete/{id}',[OperatorGaleriController::class,'delete'])->name('operator.Galeri-delete');

    Route::get('/operator/ekskul',[OperatorEkskulController::class,'index'])->name('operator.ekskul');
    Route::get('/operator/ekskul/create',[OperatorEkskulController::class,'create'])->name('operator.ekskul-create');
    Route::post('/operator/ekskul/store',[OperatorEkskulController::class,'store'])->name('operator.ekskul-store');
    Route::get('/operator/ekskul/edit/{id}',[OperatorEkskulController::class,'edit'])->name('operator.ekskul-edit');
    Route::post('/operator/ekskul/update/{id}',[OperatorEkskulController::class,'update'])->name('operator.ekskul-update');
    Route::get('/operator/ekskul/delete/{id}',[OperatorEkskulController::class,'delete'])->name('operator.ekskul-delete');

    Route::get('/operator/siswa',[OperatorSiswaController::class,'index'])->name('operator.siswa');
    Route::post('/operator/siswa/store',[OperatorSiswaController::class,'store'])->name('operator.siswa-store');
    Route::get('/operator/siswa/edit/{id}',[OperatorSiswaController::class,'edit'])->name('operator.siswa-edit');
    Route::post('/operator/siswa/edit/{id}',[OperatorSiswaController::class,'update'])->name('operator.Siswa-update');
    Route::get('/operator/siswa/delete/{id}',[OperatorSiswaController::class,'delete'])->name('operator.siswa-delete');

    Route::get('/operator/profil',[OperatorProfilSekolahController::class,'index'])->name('operator.profil');
    Route::get('/operator/profil/create',[OperatorProfilSekolahController::class,'create'])->name('operator.profil-create');
    Route::post('/operator/profil/store',[OperatorProfilSekolahController::class,'store'])->name('operator.profil-store');
    Route::get('/operator/profil/edit{id}',[OperatorProfilSekolahController::class,'edit'])->name('operator.profil-edit');
    Route::post('/operator/profil/edit/{id}',[OperatorProfilSekolahController::class,'update'])->name('operator.profil-update');
    Route::get('/operator/profil/delete/{id}',[OperatorProfilSekolahController::class,'delete'])->name('operator.profil-delete');
});

