<?php

use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::apiResource('brands', BrandController::class);

Route::prefix('brands')->group(function () {
    Route::apiResource('{brandId}/models');
});
