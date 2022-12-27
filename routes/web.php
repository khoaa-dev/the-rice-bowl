<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\MenuController;
use App\Http\Controllers\client\ServiceController;
use App\Http\Controllers\client\SocialController;

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

Route::get('/', [HomeController::class, 'index'])->name('home-page');

Route::get('/menu', [MenuController::class, 'index'])->name('menu-page');

Route::get('/service', [ServiceController::class, 'index'])->name('service-page');

Route::get('/about', [HomeController::class, 'renderAboutPage'])->name('about-page');

Route::get('/login', [HomeController::class, 'renderLoginPage'])->name('login-page');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);

Route::get('/callback/{provider}', [SocialController::class, 'callback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
