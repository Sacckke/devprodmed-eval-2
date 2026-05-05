<?php

use App\Http\Controllers\Api\v1\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ApiRecipeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('v1/posts', ApiPostController::class)
    ->middlewareFor(['index', 'show'], ['auth:sanctum', 'abilities:posts:read'])
    ->middlewareFor(['store'], ['auth:sanctum', 'abilities:posts:create'])
    ->middlewareFor(['update'], ['auth:sanctum', 'abilities:posts:update'])
    ->middlewareFor(['destroy'], ['auth:sanctum', 'abilities:posts:delete']);

    Route::apiResource('v1/recipes', ApiRecipeController::class)
    ->middlewareFor(['index', 'show'], ['auth:sanctum', 'abilities:recipes:read'])
    ->middlewareFor(['store'], ['auth:sanctum', 'abilities:recipes:create'])
    ->middlewareFor(['update'], ['auth:sanctum', 'abilities:recipes:update'])
    ->middlewareFor(['destroy'], ['auth:sanctum', 'abilities:recipes:delete']);
