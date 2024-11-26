<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogoutController;

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
});
