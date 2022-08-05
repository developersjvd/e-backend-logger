<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;

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


Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/get_user', [LogController::class, 'getUser']);
    Route::get('/log', [LogController::class, 'index']);
    Route::post('/log/create', [LogController::class, 'create']);
    Route::post('/log/delete/{id}', [LogController::class, 'delete']);
    Route::post('/log/udpate/{id}', [LogController::class, 'update']);


});


// TODO: APIS AUTENTIFICACION
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/reset_password', [AuthController::class, 'resetPassword']);
Route::get('/validateSesion', function () {
    return response()->json(auth()->check());
});
