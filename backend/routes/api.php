<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;

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

Route::post('signup', [AuthController::class, 'signup']);

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'api'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', [AuthController::class, 'logout']);
    // Route::post('refresh', [AuthController::class, 'refresh']);
    // Route::post('me', [AuthController::class, 'me']);

});

Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/{id}', [UserController::class, 'show']);
Route::get('/usuarios/findUser/{username}', [UserController::class, 'findIdByUsername']);
Route::post('/usuarios/create', [UserController::class, 'store']);
Route::put('/usuarios/update/{id}', [UserController::class, 'update']);
Route::delete('/usuarios/delete/{id}', [UserController::class, 'destroy']);

Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
Route::post('/alumnos/create', [AlumnoController::class, 'store']);
Route::put('/alumnos/update/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumnos/delete/{id}', [AlumnoController::class, 'destroy']);

Route::get('/profesores', [ProfesorController::class, 'index']);
Route::get('/profesores/{id}', [ProfesorController::class, 'show']);
Route::post('/profesores/create', [ProfesorController::class, 'store']);
Route::put('/profesores/update/{id}', [ProfesorController::class, 'update']);
Route::delete('/profesores/delete/{id}', [ProfesorController::class, 'destroy']);