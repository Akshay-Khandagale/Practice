<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/login', [RegisterController::class, 'createlogin'])->name('login');
Route::post('/login', [RegisterController::class, 'loginData']);

Route::middleware(['auth'])->group(function () {

    Route::get('/index', function () {
        return view('index');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        });

        Route::get('/add-user', function () {
            return view('addUser');
        });

        Route::get('/users', function () {
            return view('UserReport');
        });

        Route::get('/register', [RegisterController::class, 'create']);
        Route::post('/register', [RegisterController::class, 'register']);
    });
});