<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;

Route::post('/token', [AuthController::class, 'generateToken']);

Route::post('/customer-data', [CustomerController::class, 'getData'])
    ->middleware('jwt.auth');
