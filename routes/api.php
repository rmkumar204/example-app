<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;

Route::get('/states', [JobController::class, 'index']);
Route::middleware('api')->post('/profileDetails', [ProfileController::class, 'store']);
Route::middleware('api')->post('/get-jobs', [ProfileController::class, 'getJobs']);

