<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\VoucherController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vouchers',  [VoucherController::class, 'list']);
Route::post('vouchers', [VoucherController::class, 'store'])->name('vouchers.store');

Route::apiResource('users', UserController::class);
