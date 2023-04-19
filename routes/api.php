<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrenciesRatesController;
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

Route::middleware(['auth.basic'])->group(function () {
    Route::post('/currencies-rates', [CurrenciesRatesController::class, 'post']);
});
Route::get('/currencies-rates/{date?}/{currency?}', [CurrenciesRatesController::class, 'get']);
