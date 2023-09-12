<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FacultyController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('faculties', [FacultyController::class, 'index']);
    Route::post('faculties', [FacultyController::class, 'store']);
    Route::post('logout', [AuthController::class, 'logout']);
});


// Route::get('faculties', [FacultyController::class, 'index']);
