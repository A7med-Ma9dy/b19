<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('dashboard/welcome',[WelcomeController::class,'print'])->name('dashboard');
// Route::get('dashboard/users/',[RegisterController::class,'all'])->name('dashboard.users.all');
// Route::get('dashboard/users/login',[LoginController::class,'login'])->name('dashboard.users.login');
// Route::get('dashboard/users/register',[RegisterController::class,'register'])->name('dashboard.users.register');

Route::prefix('dashboard')->name('dashboard')->group(function(){
    Route::get('/welcome',[WelcomeController::class,'print']);
    Route::prefix('users')->name('.users.')->group(function(){
        Route::get('/login',[LoginController::class,'login'])->name('login');
        Route::controller(RegisterController::class)->group(function(){
            Route::get('/','all')->name('all');
            Route::get('/register','register')->name('register');
        });
    });
});
