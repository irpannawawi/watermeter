<?php

use App\Http\Controllers\Dashboard_controller;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // users 
    Route::get('/users', [Users_controller::class, 'index'])->name('users');
    Route::post('/users', [Users_controller::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [Users_controller::class, 'edit'])->name('users.edit');
    Route::put('/users', [Users_controller::class, 'update'])->name('users.update');

});

require __DIR__.'/auth.php';
