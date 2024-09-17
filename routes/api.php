<?php

use App\Http\Controllers\Api\ApiCotizacionesController;
use App\Http\Controllers\ApiCotizacionController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/cotizaciones', [ApiCotizacionesController::class, 'getCotizaciones']);
Route::put('/cotizaciones/{cotizacion_id}/status', [ApiCotizacionesController::class, 'updateStatusCotizacion']);
//getCotizacionById
Route::get('/cotizaciones/{cotizacion_id}', [ApiCotizacionesController::class, 'getCotizacionById']);
