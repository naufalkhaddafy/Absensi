<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('');
// });
// Route::view('/u_profil', 'u_profil');
// Route::view('/a_profil', 'a_profil');
// Route::view('/rekapan', 'a_rekapan');
// Route::view('/user', 'u_layout/u_dashboard');
// Route::view('/admin', 'a_layout/a_dashboard');
// Route::view('/absensi', 'u_absensi');
Route::view('/tem', 'template.cam');
Route::view('/regis', 'register');

#admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/profile', [AdminController::class, 'profile'])->name('profile');


#user
Route::get('/absensi', [UserController::class, 'absensi']);
Route::post('/absensi/insert', [UserController::class, 'insert']);
Route::post('/profile/update/{id}', [UserController::class, 'update']);

// Route::get('/tambah', [AdminController::class, 'tambah']);
//Route::get('/karyawan', [KaryawanController::class, 'index']);
//Route::get('/karyawan/detail/{id_karyawan}', [KaryawanController::class, 'detail']);

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/rekapan', [AdminController::class, 'rekapan'])->name('rekapan');
    Route::get('/karyawan', [AdminController::class, 'karyawan'])->name('karyawan');;
    Route::get('/karyawan/detail/{id}', [AdminController::class, 'detail']);
    Route::get('/detaillokasi/{id}', [AdminController::class, 'detaillokasi']);
    Route::get('/karyawan/delete/{id}', [AdminController::class, 'delete']);
    Route::get('/excel/{tglawal}/{tglakhir}', [AdminController::class, 'exportexcel']);
    Route::get('/karyawan/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/karyawan/update/{id}', [AdminController::class, 'update']);
    Route::get('/tambah', [AdminController::class, 'tambah']);
    Route::post('/tambah/insert', [AdminController::class, 'tambahstaff']);
    Route::get('/deleterekapan', [AdminController::class, 'deleterekapan']);
});
Route::group(['middleware' => 'user'], function () {
    //
});
