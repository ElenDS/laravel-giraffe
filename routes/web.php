<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'show']);
Route::get('/home', function (){
    return redirect('/');
});
Route::get('/login', function (){
    return redirect('/');
});

Route::middleware('guest')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registration');
    Route::post('/registration', [AuthController::class, 'register']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
