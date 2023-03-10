<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

// Route::get('/',function(){
//     return view('welcome');
// });

// Route::get('/register',[AuthenticationController::class,'create']);
// Route::post('/register',[AuthenticationController::class,'register']);
// Route::get('/login',[AuthenticationController::class,'login'])->name('login');
// Route::post('login',[AuthenticationController::class,'authenticate']);
// Route::post('logout',[AuthenticationController::class,'logout']);
// Use ARgon dashboard
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\CourrierArriveController;
use App\Http\Controllers\CourrierDepartController;
use App\Models\CourrierDepart;

    Route::get('/', function () {return redirect('/dashboard');});
	Route::get('/register', [RegisterController::class, 'create'])->middleware('is_admin')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('is_admin')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->name('login');
	Route::post('/login', [LoginController::class, 'login'])->name('login.perform');



	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
//  user management
Route::get('/user-management', [UserProfileController::class, 'showAllUsers'])->middleware('is_admin')->name('user-management');

// courrier depart
Route::get('/courrier-depart', [CourrierDepartController::class, 'index'])->name('courrier-depart');
// add courrier depart
Route::post('/ajouter-courrier', [CourrierDepartController::class, 'store'])->name('ajouter.courrier-depart');


// courrier arrive
Route::get('/courrier-arrive', [CourrierArriveController::class, 'index'])->name('courrier-arrive');
// change role
Route::get('/change-role/{id}/{is_admin}', [UserProfileController::class, 'changerRole'])->name('change-role');



	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


