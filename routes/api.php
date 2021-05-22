<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controller
use App\Http\Controllers\TrafficController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/traffics', [TrafficController::class, 'traffics']);
Route::get('/traffics/{traffic_light_id}', [TrafficController::class, 'traffic_light_id']);