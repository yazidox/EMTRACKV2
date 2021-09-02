<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalarierController;
use App\Http\Controllers\DailyhourController;


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


Route::get('salariesSalle', [SalarierController::class, 'getSalarieSalle']);
Route::get('salariesCuisine', [SalarierController::class, 'getSalarieCuisine']);
Route::get('salariesPlonge', [SalarierController::class, 'getSalariePlonge']);
Route::post('checkpin', [SalarierController::class, 'checkpin']);
Route::post('ishere', [SalarierController::class, 'ishere']);
Route::post('pointer', [DailyhourController::class, 'pointer']);
Route::post('pointer_depart', [DailyhourController::class, 'pointerDepart']);
