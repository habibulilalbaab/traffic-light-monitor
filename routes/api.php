<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//controller
use App\Http\Controllers\TrafficController;
use App\Http\Controllers\IntersectionController;

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
//traffic CRUD
Route::get('/all-traffic', [TrafficController::class, 'index']);
Route::post('/traffic/store', [TrafficController::class, 'traffic_store']);
Route::put('/traffic/update/{id}', [TrafficController::class, 'traffic_update']);
Route::get('/traffic/destroy/{id}', [TrafficController::class, 'traffic_destroy']);
//intersection CRUD
Route::get('/all-intersection', [IntersectionController::class, 'index']);
Route::post('/intersection/store', [IntersectionController::class, 'traffic_intersection_store']);
Route::put('/intersection/update/{id}', [IntersectionController::class, 'traffic_intersection_update']);
Route::get('/intersection/destroy/{id}', [IntersectionController::class, 'traffic_intersection_destroy']);