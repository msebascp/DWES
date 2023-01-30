<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('ValidateId')->get('/owner/{id}/pet', [OwnerController::class, 'pet']);
Route::middleware('ValidateId')->get('/pet/{id}/owner', [PetController::class, 'owner']);
Route::middleware('ValidateId')->get('/pet/{id}/toys', [PetController::class, 'toys']);
Route::middleware('ValidateId')->get('/toy/{id}/pet', [ToyController::class, 'pet']);

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::middleware('AuthLogin')->get('/me', [LoginController::class, 'me']);
Route::middleware('AuthLogin')->get('/logout', [LoginController::class, 'logout']);
