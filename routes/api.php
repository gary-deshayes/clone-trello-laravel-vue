<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColumnsController;
use App\Http\Controllers\CardController;

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
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/dashboard/{id}', [DashboardController::class, 'getDashboard']);
Route::get('/v1/dashboards', [DashboardController::class, 'getDashboards']);
Route::post('/v1/dashboard', [DashboardController::class, 'createDashboard']);
Route::put('/v1/dashboard', [DashboardController::class, 'updateDashboard']);
Route::delete('/v1/dashboard', [DashboardController::class, 'deleteDashboard']);

//Card
Route::post('/v1/dashboard/card', [CardController::class, 'addCard']);
Route::put('/v1/dashboard/card', [CardController::class, 'updateCard']);
Route::delete('/v1/dashboard/card', [CardController::class, 'deleteCard']);
Route::post('/v1/dashboard/{id}/change_card_column', [CardController::class, 'changeCardColumn']);
//Column
Route::post('/v1/dashboard/column', [ColumnsController::class, 'addColumn']);
Route::put('/v1/dashboard/column', [ColumnsController::class, 'updateColumn']);
Route::delete('/v1/dashboard/column', [ColumnsController::class, 'deleteColumn']);
