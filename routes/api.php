<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\MedicController;
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
    Route::get('/schedules/doctor', [DataController::class, 'scheduleDoctor']);
    //article
    Route::get('/articles', [DataController::class, 'articles']);
    Route::get('/category-articles', [DataController::class, 'categoryArticles']);
    //registration
    Route::get('/registration', [DataController::class, 'listRegistration']);
    Route::delete('/registration/{id}', [DataController::class, 'deleteRegistration']);
    //medic
    Route::get('/medical-record', [MedicController::class, 'getMedic']);
    Route::post('/medical-record', [MedicController::class, 'createMedic']);
    Route::get('/update-medical-record/{id}', [MedicController::class, 'updateMedic']);
    //treatment
    Route::get('/treatment', [MedicController::class, 'getTreatment']);
    Route::post('/treatment', [MedicController::class, 'createTreatment']);
    //invoice
    Route::get('/invoice', [MedicController::class, 'getInvoice']);
    // control schedule
    Route::get('/control-schedule', [MedicController::class, 'getControl']);
    Route::get('/control-schedule-doctor', [MedicController::class, 'getControlSchedule']);
    Route::post('/control-schedule', [MedicController::class, 'createControl']);
    // control schedule
    Route::get('/prescription', [MedicController::class, 'getPrescription']);
    Route::post('/prescription/{invoice}', [MedicController::class, 'createPrescription']);
    //product
    Route::get('/products', [DataController::class, 'products']);
    Route::get('/category-products', [DataController::class, 'categoryProduct']);
});
