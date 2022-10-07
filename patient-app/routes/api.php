<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KinController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PersonController;
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

Route::controller(AuthController::class)->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::prefix('patient')->controller(PatientController::class)->group(function() {
        Route::post('create', 'create');
        Route::put('update/{id}', 'update');
        Route::put('delete/{id}', 'delete');
        Route::get('list', 'list');
        Route::get('{patientId}', 'byPatientId');
        Route::post('import', 'import');
    });

    Route::prefix('person')->controller(PersonController::class)->group(function() {
        Route::post('create', 'create');
        Route::put('update/{id}', 'update');
        Route::put('delete/{id}', 'delete');
        Route::get('{idCard}', 'byIdCard');
    });

    Route::prefix('kin')->controller(KinController::class)->group(function() {
        Route::post('create', 'create');
        Route::put('delete', 'delete');
        Route::get('{idCard}', 'byIdCard');
        Route::get('k/{idCard}', 'byKinIdCard');
    });

    Route::prefix('medical')->controller(MedicalController::class)->group(function() {
        Route::post('create', 'create');
        Route::put('update/{id}', 'update');
        Route::put('delete/{id}', 'delete');
        Route::get('{patientId}', 'byPatientId');
    });
});