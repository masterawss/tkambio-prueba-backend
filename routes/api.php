<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Api;

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


Route::post('register', [Api\AuthController::class, 'register']);
Route::post('login', [Api\AuthController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    Route::get('user-profile', [Api\AuthController::class, 'userProfile']);
    Route::get('logout', [Api\AuthController::class, 'logout']);

    Route::post('generate-report', [Api\ReportController::class, 'generateReport']);
    Route::get('list-reports', [Api\ReportController::class, 'listReports']);
});
Route::get('get-report/{report_id}', [Api\ReportController::class, 'getReport']);

