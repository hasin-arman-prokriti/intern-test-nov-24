<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


// Route::get('/', function () {
//     return view('upload');
// });

Route::get('/', [ImageController::class, 'index'])->name('images.index');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::post('/images/upload', [ImageController::class, 'upload'])->name('images.upload');
