<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Regional
Route::get('regionals', [RegionalController::class, 'index']);
Route::get('regionals/{id}', [RegionalController::class, 'show']);
Route::post('regionals', [RegionalController::class, 'store']);
Route::put('regionals/{id}', [RegionalController::class, 'update']);
Route::delete('regionals/{id}', [RegionalController::class, 'destroy']);

//Area
Route::get('areas', [AreaController::class, 'index']);
Route::get('areas/regional/{id}', [AreaController::class, 'getAreaByRegional']);
Route::get('areas/{id}', [AreaController::class, 'show']);
Route::post('areas', [AreaController::class, 'store']);
Route::put('areas/{id}', [AreaController::class, 'update']);
Route::delete('areas/{id}', [AreaController::class, 'destroy']);

//Unit
Route::get('units', [UnitController::class, 'index']);
Route::get('units/area/{id}', [UnitController::class, 'getUnitByArea']);
Route::get('units/{id}', [UnitController::class, 'show']);
Route::post('units', [UnitController::class, 'store']);
Route::put('units/{id}', [UnitController::class, 'update']);
Route::delete('units/{id}', [UnitController::class, 'destroy']);
