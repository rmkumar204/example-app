<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
// Route::get('/', function () {
//     return view('app');
// });
Route::get('/',  [JobController::class, 'index'])->name('initial');
Route::get('/second', [ ProfileController::class,'index'])->name('second');
Route::view('/third', 'third')->name('third');

