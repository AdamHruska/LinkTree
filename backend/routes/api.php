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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get_links/{id}', [\App\Http\Controllers\LinkController::class, 'getLinks']);

Route::post('new_link', [\App\Http\Controllers\LinkController::class, 'newLink']);

Route::get('get_link/{id}', [\App\Http\Controllers\LinkController::class, 'getLink']);

Route::post('update_link/{id}', [\App\Http\Controllers\LinkController::class, 'updateLink']);


Route::get('get_users', [\App\Http\Controllers\UserController::class, 'getAllUsers']);