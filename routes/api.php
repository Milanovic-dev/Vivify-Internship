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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return '200 Returned';
})->middleware('age');

Route::post('/test', function () {
    return '201 Created';
});

Route::delete('/test', function() {
    return '200 Deleted';
});

Route::put('/test', function () {
    return '200 Updated';
});

Route::patch('/test', function () {
    return '200 Patched';
});
