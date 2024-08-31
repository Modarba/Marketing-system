<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('AddSale/{id}',[\App\Http\Controllers\Product::class,'AddSaleForProduct']);
Route::post('sendinvite',[\App\Http\Controllers\UserController::class,'send_invite_for_friend']);
Route::post('Acceptinvite/{id}',[\App\Http\Controllers\UserController::class,'AcceptInvite']);
Route::post('SendRequest',[\App\Http\Controllers\UserController::class,'Send_a_friend_request']);
Route::post('ResponseRequest/{id}',[\App\Http\Controllers\UserController::class,'ResponseRequest']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('createPage',[\App\Http\Controllers\UserController::class,'CreatePage']);
    return $request->user();
});
