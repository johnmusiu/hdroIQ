<?php

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

Route::get('/', function (){
    return response()->json(['message' => 'login to access'], 401);
})->name('/');

Route::post('/login', '\App\Http\Controllers\API\AuthController@login');
Route::post('/register', "\App\Http\Controllers\API\UserController@store");

Route::apiResource('tasks', \App\Http\Controllers\API\TaskController::class)->middleware('auth:api');
