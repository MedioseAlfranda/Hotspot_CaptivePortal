<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});



// Untuk Route Utama
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// untuk  Route Login Register Route
Route::post('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'userRegister'])->name('user.register');
Route::get('/hotspot/users',[RouterController::class, 'hotspotUsers']);


// Untuk Route Koneksi Wifi 
Route::get('/subcription', [RouterController::class, 'subscription'])->name('user.subscription')->middleware('auth');
Route::get('/connecttoWifi', [RouterController::class, 'connecttoWifi']);


// Untuk Route Authentikasi Socialite 
Route::get('/auth/{provider}',[LoginController::class,'redirectToProvider']);
Route::get('/auth/{provider}/callback', [LoginController::class,'handleProvideCallback']);