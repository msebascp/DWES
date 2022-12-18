<?php

use App\Http\Controllers\AlumnoController;
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

Route::prefix('/alumnos')->group(function () {
    Route::get('', [AlumnoController::class, 'getAll']);
    Route::middleware('ValidateId')->get('/{id}', [AlumnoController::class, 'getById']);
    Route::post('', [AlumnoController::class, 'create']);
    Route::middleware('ValidateId')->delete('/{id}', [AlumnoController::class, 'delete']);
});

