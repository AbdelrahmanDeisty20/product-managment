<?php

use App\Http\Controllers\Api\Main\ProductsController;
use App\Http\Middleware\AutoChekPermsions;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products',ProductsController::class)->middleware(AutoChekPermsions::class);

