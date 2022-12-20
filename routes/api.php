<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/verify', [VerificationController::class, 'verify'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::get('/owners', [UserController::class, 'getOwner']);
    Route::get('/owner/{id}', [UserController::class, 'getDetailUser']);
    Route::get('/patients', [UserController::class, 'getPatient']);
    Route::get('/articles', [DataController::class, 'articles']);
    Route::get('/schedules/doctor', [DataController::class, 'scheduleDoctor']); 
});
