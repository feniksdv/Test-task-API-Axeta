<?php

use App\Http\Controllers\Avatar\AvatarController;
use App\Http\Controllers\Experience\ExperienceController;
use App\Http\Controllers\location\LocationController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [UserController::class, 'getUser']);
        Route::put('/updateUserName', [UserController::class, 'updateUserName']);

        Route::patch('/updateGeo', [ProfileController::class, 'updateGeo']);

        Route::group(['prefix' => 'experience'], function () {
            Route::post('/create', [ExperienceController::class, 'create']);
            Route::patch('/updateDuration', [ExperienceController::class, 'updateDuration']);
            Route::delete('/delete', [ExperienceController::class, 'delete']);
        });

        Route::group(['prefix' => 'avatar'], function () {
            Route::get('/', [AvatarController::class, 'getAvatar']);
            Route::post('update', [AvatarController::class, 'updateAvatar']);
        });
    });
    Route::group(['prefix' => 'location'], function () {
        Route::get('/getLocation', [LocationController::class, 'getLocation']);
    });
});
