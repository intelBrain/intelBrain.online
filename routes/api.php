<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('stk/accessToken', [MpesaController::class, 'generateAccessToken'])->name('accessToken');
// Route::post('stk/push/{id}', [MpesaController::class, 'customerMpesaSTKPush'])->name('push');

Route::group(['prefix' => 'stk'], function () {
    Route::post('accessToken', [MpesaController::class, 'generateAccessToken']);
    Route::post('push/{id}', [MpesaController::class, 'customerMpesaSTKPush'])->name('push');
    Route::post('validation', [MpesaController::class, 'mpesaValidation']);
    Route::post('transaction/confirmation', [MpesaController::class, 'mpesaConfirmation']);
    Route::post('register/url', [MpesaController::class, 'mpesaRegisterUrls']);
});