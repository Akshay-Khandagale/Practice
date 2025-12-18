<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddUserController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/test-web', function () {
    return 'web ok';
});
