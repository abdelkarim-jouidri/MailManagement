<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('users.login');
});

Route::POST('/login',[AuthenticationController::class,'authenticate'])->name('login');

Route::GET('/login',[AuthenticationController::class,'login']);

Route::GET('/register',[AuthenticationController::class,'register']);

Route::post('/register', function (Request $request) {
    dd($request);
})->name('register');

// Route::get('/register', function () {
//     return view('users.register')->name('register');
// });
