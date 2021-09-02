<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SalarierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Route::resource('restaurants', RestaurantController::class);
Route::resource('salariers', SalarierController::class);
Route::get('salariers/{id}/rapport', [SalarierController::class, 'getRapport'])->name('salarierapport');
Route::get('salariers/{id}/pdf', [SalarierController::class, 'generatePDF'])->name('pdfrapport');

