<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AddUserController;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [AddUserController::class, 'userReport']);
        Route::get('/getdata', [AddUserController::class, 'getData']);
    });

});
