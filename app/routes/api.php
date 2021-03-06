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


Route::get('/startups/{id}','StartupController@GetStartupByUser');
Route::get('/kindstartups','KindstartupController@index');

Route::post('/startups/store', [App\Http\Controllers\StartupController::class, 'Store']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

