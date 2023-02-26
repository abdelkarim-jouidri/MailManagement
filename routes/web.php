<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('users.login');
});
Route::get('/login', function () {
    return view('users.login');
})->name('login');
