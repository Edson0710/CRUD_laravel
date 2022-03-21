<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MascotasController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');


Route::resource('mascotas', MascotasController::class);

// Route::get('mascotas', [MascotasController::class, 'index'])->name('mascotas.index');