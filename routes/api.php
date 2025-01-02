<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Main\MainController;
use App\Http\Middleware\AutoChekPermsions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace'=>'Api'],function(){
    Route::group(['prefix'=>'Auth'],function(){
        Route::post('register',[AuthController::class,'register']);
        Route::post('login',[AuthController::class,'login']);
        Route::get('products',[MainController::class,'index']);
        Route::post('products/details',[MainController::class,'showProduct']);
        Route::group(['middleware'=>'auth:api'],function(){
            Route::post('logout',[AuthController::class,'logout']);
            Route::post('registerToken',[AuthController::class,'registerToken']);

        });

    });
});

