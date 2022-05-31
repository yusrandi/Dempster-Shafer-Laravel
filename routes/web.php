<?php

use App\Http\Controllers\BasisPengetahuansController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\UserController;
use App\Models\Gejala;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::resource('penyakits', PenyakitController::class);
    Route::get('penyakits/delete/{penyakit}', [PenyakitController::class, 'destroy']);

    Route::resource('gejalas', GejalaController::class);
    Route::get('gejalas/delete/{gejala}', [GejalaController::class, 'destroy']);

    Route::resource('basisPengetahuans', BasisPengetahuansController::class);
    Route::get('basisPengetahuans/delete/{basisPengetahuans}', [BasisPengetahuansController::class, 'destroy']);
    Route::put('basis/{basisPengetahuans}', [BasisPengetahuansController::class, 'update']);

    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/delete/{laporan}', [LaporanController::class, 'destroy']);
    Route::resource('user', UserController::class)->except('create', 'show');
    Route::get('user/delete/{user}', [UserController::class, 'destroy']);
});
