<?php

use App\Http\Controllers\Api\V1\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Route::apiResource автоматически генерирует маршруты для index, store, show, update, destroy
    Route::apiResource('books', BookController::class);
});
