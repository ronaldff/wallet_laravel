<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\walletController;

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
