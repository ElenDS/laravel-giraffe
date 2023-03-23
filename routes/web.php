<?php
declare(strict_types=1);

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
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

Route::get('/', [AdController::class, 'show']);
Route::get('/home', function () {
    return redirect('/');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return redirect('/registration');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/registration', [AuthController::class, 'registrationForm'])->name('registration');
    Route::post('/registration', [AuthController::class, 'register']);
    Route::get('/forgot-password', [PasswordResetController::class, 'userEmail']);
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail']);;
    Route::get('/{email}/reset-password/{uniqid}', [PasswordResetController::class, 'newPassword']);
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/edit', [AdController::class, 'newAd']);
    Route::post('/edit', [AdController::class, 'create']);
    Route::get('/edit/{ad}', [AdController::class, 'editAd']);
    Route::post('/edit/{ad}', [AdController::class, 'update']);
    Route::get('/delete/{ad}', [AdController::class, 'delete']);
    Route::get('/{ad}', [AdController::class, 'pageAd']);
});












