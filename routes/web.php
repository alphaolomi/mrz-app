<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/decode', [App\Http\Controllers\HomeController::class, 'decode'])->name('decode');



Route::get('/generate', [App\Http\Controllers\MRZController::class, 'index'])->name('mrz.index');
Route::post('/generate', [App\Http\Controllers\MRZController::class, 'generate'])->name('mrz.generate');
