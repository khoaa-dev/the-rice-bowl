<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\EvaluateController;
use App\Http\Controllers\client\MenuController;
use App\Http\Controllers\client\ServiceController;
use App\Http\Controllers\client\SocialController;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', [HomeController::class, 'index'])->name('home-page-no-slug');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu-page');

Route::get('/service', [ServiceController::class, 'index'])->name('service-page');

Route::get('/about', [HomeController::class, 'renderAboutPage'])->name('about-page');

Route::get('/login', [HomeController::class, 'renderLoginPage'])->name('login-page');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);

Route::get('/callback/{provider}', [SocialController::class, 'callback']);

Auth::routes();


// Evaluates routes
// Route::post('/evaluate', 'EvaluateController@send_comment')->name('send_comment');
Route::post('/evaluate', [EvaluateController::class, 'send_comment'])->name('send');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin');

    Route::get('/form-validation', function () {
        return view('admin.form_validation');
    });

    Route::get('/form-wizards', function () {
        return view('admin.form_wizards');
    });

    Route::get('/form', function () {
        return view('admin.form');
    });

    Route::get('/icons', function () {
        return view('admin.icons');
    });

    Route::get('/glyphicons', function () {
        return view('admin.glyphicons');
    });

    Route::get('/invoice', function () {
        return view('admin.invoice');
    });

    Route::get('/profile', function () {
        return view('admin.profile');
    });

    Route::get('/projects', function () {
        return view('admin.projects');
    });

    Route::get('/project-detail', function () {
        return view('admin.project_detail');
    });

    Route::get('/contacts', function () {
        return view('admin.contacts');
    });

    Route::get('/tables', function () {
        return view('admin.tables');
    });

    Route::get('/tables-dynamic', function () {
        return view('admin.tables_dynamic');
    });
});