<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ClientController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clients', [ClientController::class, 'index']);
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients/{client}', [ClientController::class, 'show']);
Route::put('/clients/{client}', [ClientController::class, 'update']);
Route::delete('/clients/{client}', [ClientController::class, 'destroy']);


Route::get('/branches', [BranchController::class, 'index']);
Route::post('/branches', [BranchController::class, 'store']);
Route::get('/branches/{branch}', [BranchController::class, 'show']);
Route::put('/branches/{branch}', [BranchController::class, 'update']);
Route::delete('/branches/{branch}', [BranchController::class, 'destroy']);


Route::get('/barbers', [BarberController::class, 'index']);
Route::post('/barbers', [BarberController::class, 'store']);
Route::get('/barbers/{barber}', [BarberController::class, 'show']);
Route::put('/barbers/{barber}', [BarberController::class, 'update']);
Route::delete('/barbers/{barber}', [BarberController::class, 'destroy']);
Route::get('/branches/{branch}/barbers', [BranchController::class, 'getBarbersByBranch']);


Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/{service}', [ServiceController::class, 'show']);
Route::put('/services/{service}', [ServiceController::class, 'update']);
Route::delete('/services/{service}', [ServiceController::class, 'destroy']);


Route::get('/schedules', [ScheduleController::class, 'index']);
Route::post('/schedules', [ScheduleController::class, 'store']);
Route::get('/schedules/{schedule}', [ScheduleController::class, 'show']);
Route::put('/schedules/{schedule}', [ScheduleController::class, 'update']);
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy']);
Route::get('/check-availability/{barber_id}/{date}/{time}', 'ScheduleController@checkAvailability');



Route::get('/drinks', [DrinkController::class, 'index']);
Route::post('/drinks', [DrinkController::class, 'store']);
Route::get('/drinks/{drink}', [DrinkController::class, 'show']);
Route::put('/drinks/{drink}', [DrinkController::class, 'update']);
Route::delete('/drinks/{drink}', [DrinkController::class, 'destroy']);


Route::get('/music', [MusicController::class, 'index']);
Route::post('/music', [MusicController::class, 'store']);
Route::get('/music/{music}', [MusicController::class, 'show']);
Route::put('/music/{music}', [MusicController::class, 'update']);
Route::delete('/music/{music}', [MusicController::class, 'destroy']);


Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show']);
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update']);
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy']);
