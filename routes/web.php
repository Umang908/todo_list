<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\TodoController::class,'index']);
Route::post('/add', [\App\Http\Controllers\TodoController::class,'add']);
Route::post('/delete', [\App\Http\Controllers\TodoController::class,'delete']);
Route::post('/edit', [\App\Http\Controllers\TodoController::class,'edit']);
