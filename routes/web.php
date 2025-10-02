<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [MainController::class, 'main'])->name('main');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource(name: 'applications', controller: ApplicationController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
