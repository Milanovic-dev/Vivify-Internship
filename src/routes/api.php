<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [HomeController::class, 'testGet'])->middleware('age');
Route::post('/test', [HomeController::class, 'testCreate']);
Route::put('/test', [HomeController::class, 'testUpdate']);
Route::patch('/test', [HomeController::class, 'testPatch']);
Route::delete('/test', [HomeController::class, 'testGet']);

Route::resource('posts', PostController::class);
