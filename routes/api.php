<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::post('checkout', [TransactionController::class, 'checkout']);

    Route::get('transaction', [TransactionController::class, 'all']);
    Route::post('transaction/{id}', [TransactionController::class, 'update']);
});

// User can Access before Login
Route::post('login', [UserController::class, 'login']);

Route::post('register', [UserController::class, 'register']);

Route::get('food', [FoodController::class, 'all']);
Route::post('food', [FoodController::class, 'store']);
Route::post('food/{id}', [FoodController::class, 'update']);