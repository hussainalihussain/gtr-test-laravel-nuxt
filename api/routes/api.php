<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Services\ApiTokenService;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('create-token', function (ApiTokenService $apiTokenService) {
    return $apiTokenService->create();
});
Route::get('products', ProductController::class);
Route::apiResource('carts', CartController::class);
