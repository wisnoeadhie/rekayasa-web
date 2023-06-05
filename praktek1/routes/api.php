<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/read',[MahasiswaController::class,'read']);
Route::post('/create',[MahasiswaController::class,'create']);
Route::put('/update/{nim}', [MahasiswaController::class, 'update']);
Route::delete('/delete/{nim}', [MahasiswaController::class, 'delete']);
