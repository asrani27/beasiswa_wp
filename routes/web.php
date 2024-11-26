<?php

use App\Http\Controllers\BKMController;
use App\Http\Controllers\BKMPController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KriteriaController;

Route::get('/', function () {
    return view('login');
});

Route::post('login', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'index'])->name('login');

Route::get('/logout', [LogoutController::class, 'logout']);
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin', [HomeController::class, 'superadmin']);

    Route::get('data/siswa', [SiswaController::class, 'index']);
    Route::get('data/siswa/create', [SiswaController::class, 'create']);
    Route::post('data/siswa/create', [SiswaController::class, 'store']);
    Route::get('data/siswa/cari', [SiswaController::class, 'cari']);
    Route::get('data/siswa/delete/{id}', [SiswaController::class, 'delete']);
    Route::get('data/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::post('data/siswa/edit/{id}', [SiswaController::class, 'update']);

    Route::get('data/kriteria', [KriteriaController::class, 'index']);
    Route::get('data/kriteria/create', [KriteriaController::class, 'create']);
    Route::post('data/kriteria/create', [KriteriaController::class, 'store']);
    Route::get('data/kriteria/cari', [KriteriaController::class, 'cari']);
    Route::get('data/kriteria/delete/{id}', [KriteriaController::class, 'delete']);
    Route::get('data/kriteria/edit/{id}', [KriteriaController::class, 'edit']);
    Route::post('data/kriteria/edit/{id}', [KriteriaController::class, 'update']);

    Route::get('data/bkm', [BKMController::class, 'index']);
    Route::get('data/bkm/create', [BKMController::class, 'create']);
    Route::post('data/bkm', [BKMController::class, 'store']);

    Route::get('data/wp/bkm', [BKMController::class, 'wp']);
    Route::get('data/wp/bkmp', [BKMPController::class, 'wp']);

    Route::get('data/hasilbkm', [BKMController::class, 'hasil']);
    Route::get('data/hasilbkmp', [BKMPController::class, 'hasil']);

    Route::get('data/bkmp', [BKMPController::class, 'index']);
    Route::get('data/bkmp/create', [BKMPController::class, 'create']);
    Route::post('data/bkmp', [BKMPController::class, 'store']);
});
