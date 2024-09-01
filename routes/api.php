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
Route::post('register',[\App\Http\Controllers\Auth::class,'register']);
Route::post('Login',[\App\Http\Controllers\Auth::class,'login']);
Route::post('Logout',[\App\Http\Controllers\Auth::class,'logout']);
//Route::get('member/{id}',[\App\Http\Controllers\UserController::class,'MemberOfPage'])->middleware('CanPublish');
Route::post('createPage',[\App\Http\Controllers\UserController::class,'CreatePage']);
Route::post('Canpublih/{id}',[\App\Http\Controllers\UserController::class,'AddMemberToPage']);
Route::get('AddSale/{id}',[\App\Http\Controllers\Product::class,'AddSaleForProduct']);
Route::post('sendinvite',[\App\Http\Controllers\UserController::class,'send_invite_for_friend']);
Route::post('Acceptinvite/{id}',[\App\Http\Controllers\UserController::class,'AcceptInvite']);
Route::post('SendRequest',[\App\Http\Controllers\UserController::class,'Send_a_friend_request']);
Route::post('ResponseRequest/{id}',[\App\Http\Controllers\UserController::class,'ResponseRequest']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
