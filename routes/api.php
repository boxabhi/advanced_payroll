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

Route::get('/short_code/{value}' ,'App\Http\Controllers\Api\ApiController@short_code');

Route::get('/department/{id}' ,'App\Http\Controllers\Api\ApiController@department' );
Route::get('/designation/{id}' ,'App\Http\Controllers\Api\ApiController@designation' );
Route::get('/employee/{company_id}/{department_id}/{designation_id}' ,'App\Http\Controllers\Api\ApiController@employee' );

