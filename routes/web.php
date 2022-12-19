<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PracticeScheduleController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpeciesPatientController;
use App\Http\Controllers\UserController;
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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/settings/profile', [SettingController::class, 'profile']);
    Route::put('/settings/password', [SettingController::class, 'updatepassword']);
    Route::put('/settings/update', [SettingController::class, 'updateprofile']);
    Route::resource('/users', UserController::class);
    Route::resource('/practice-schedules', PracticeScheduleController::class);
    Route::resource('/patients', PatientController::class);
    Route::resource('/species', SpeciesPatientController::class);
    Route::resource('/category-articles', CategoryArticleController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/owners', OwnerController::class);
    Route::resource('/category-products', ProductCategoryController::class);
});
