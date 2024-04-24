<?php

use App\Modules\Auth\Controller\AuthController;
use App\Modules\User\Controller\ShowController as UserShow;
use App\Modules\User\Controller\IndexController as UsersIndex;
use App\Modules\User\Controller\UpdateController as UserUpdate;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', AuthController::class);
    });
    Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
        Route::get('/', UserShow::class);
        Route::put('/', UserUpdate::class);
    });
    Route::prefix('users')->group(function () {
        Route::get('/', UsersIndex::class);
    });
});
