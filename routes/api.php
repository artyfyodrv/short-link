<?php

use App\Http\Controllers\Api\V1\LinkController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
   Route::post('link', [LinkController::class, 'store']);
});

