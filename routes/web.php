<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MapelsiswaController;
use App\Http\Controllers\SiswaController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

// LOGIN
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::get('/auth/github/redirect', [LoginController::class, 'githubLogin'])->name('githubLogin');
Route::get('/auth/github/callback', [LoginController::class, 'githubLoginProses'])->name('githubLoginProses');

Route::get('/auth/google/redirect', [LoginController::class, 'googleLogin'])->name('googleLogin');
Route::get('/auth/google/callback', [LoginController::class, 'googleLoginProses'])->name('googleLoginProses');
// END LOGIN

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
Route::get('/email/need-verification', [LoginController::class, 'verifIndex'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [LoginController::class, 'verifProses'])->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/resend-verification', [LoginController::class, 'resendVerif'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// END REGISTER

// FORGOT PASSWORD
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->middleware('guest')->name('forgot-password');
Route::post('/forgot-password', [LoginController::class, 'forgotProses'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'updatePassword'])->middleware('guest')->name('password.update');
// END FORGOT PASSWORD



Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'verified'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/show/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/siswa/mapel-siswa/{id}', [SiswaController::class, 'mapelSiswa']);

    Route::get('/jurusan', [JurusanController::class, 'index'])->name('admin.jurusan');
    Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('/jurusan/show/{id}', [JurusanController::class, 'show'])->name('jurusan.show');
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    Route::get('/guru', [GuruController::class, 'index'])->name('admin.guru');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/show/{id}', [GuruController::class, 'show'])->name('guru.show');
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/delete/{id}', [GuruController::class, 'delete'])->name('guru.delete');

    // Route::get('/mapel-siswa', [MapelsiswaController::class, 'index']);
});
