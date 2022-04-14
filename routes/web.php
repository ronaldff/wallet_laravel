<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\walletController;
use App\Http\Controllers\GoogleV3CaptchaController;

use App\Http\Controllers\GoogleSocialiteController;

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

Route::get('/', [walletController::class,'index'])->name('wallet');
Route::post('addmoney', [walletController::class,'addmoney'])->name('addmoney_wallet');
Route::get('/paymentstatus',[walletController::class,'paymentstatus'])->name('paymentstatus');

// google capta v3
Route::get('google-v3-recaptcha', [GoogleV3CaptchaController::class, 'index']);
Route::post('validate-g-recaptcha', [GoogleV3CaptchaController::class, 'validateGCaptch']);


// login with google
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);




