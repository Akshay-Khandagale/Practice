<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/ping', function () {
//     return ['status' => 'ok from web'];
// });
// Regular user routes (or allow both)
Route::get('/index', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('add-user',[AddUserController::class,'addUser']);
Route::post('savelink',[AddUserController::class,'saveLink']);

// Show page
    Route::get('/users', [AddUserController::class, 'userReport']);

// AJAX Request
Route::get('/getdata', [AddUserController::class, 'getData']);

// New Registration
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// Login page and processing (web/session-based)
Route::get('/loginpage', [RegisterController::class, 'createlogin']);
Route::post('/loginpage', [RegisterController::class, 'loginData']);