<?php

use App\Http\Controllers\Dashboard_controller;
use App\Http\Controllers\Log_controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users_controller;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard',[Dashboard_controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/tagihan',[Dashboard_controller::class, 'tagihan_user'])->middleware(['auth', 'verified'])->name('tagihan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/generate_token', [ProfileController::class, 'generate_token'])->name('profile.generate_token');
    
    // users 
    Route::get('/users', [Users_controller::class, 'index'])->name('users');
    Route::post('/users', [Users_controller::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [Users_controller::class, 'edit'])->name('users.edit');
    Route::put('/users', [Users_controller::class, 'update'])->name('users.update');
    Route::delete('/users', [Users_controller::class, 'delete'])->name('users.delete');
    // log
    Route::get('/log', [Log_controller::class, 'view_log'])->name('log');
    Route::get('/grafik_data', [Log_controller::class, 'grafik_data'])->name('get_grafik');
    
    // pelanggan
    Route::get('/pelanggan', [Dashboard_controller::class, 'pelanggan'])->name('pelanggan');
    
    // tagihan
    Route::get('/tagihan_pengguna', [Dashboard_controller::class, 'tagihan_admin'])->name('tagihan-pengguna');
    Route::get('/generate_tagihan', [Dashboard_controller::class, 'generate_tagihan'])->name('generate-tagihan');
    Route::get('/bayar_tagihan/{id}', [Dashboard_controller::class, 'bayar_tagihan'])->name('bayar-tagihan');
});

require __DIR__.'/auth.php';
