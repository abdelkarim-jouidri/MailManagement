<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/',function(){
    return view('welcome');
});

Route::get('/register',[AuthenticationController::class,'create']);
Route::post('/register',[AuthenticationController::class,'register']);
Route::get('/login',[AuthenticationController::class,'login'])->name('login');
Route::post('login',[AuthenticationController::class,'authenticate']);
Route::post('logout',[AuthenticationController::class,'logout']);
