<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddUserController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/ping', function () {
//     return ['status' => 'ok from web'];
// });

Route::get('/index', function () {
    return view('index');
});

Route::get('add-user',[AddUserController::class,'addUser']);

// Show page
Route::get('/users', [AddUserController::class, 'userReport']);

// AJAX Request
Route::get('/getdata', [AddUserController::class, 'getData']);
