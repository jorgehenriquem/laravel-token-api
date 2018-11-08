<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function (){
    route::get('/comments', 'CommentsController@index');
    route::get('/comments/{comments}', 'CommentsController@show');
});

Route::middleware('auth:api')->prefix('v1')->group(function (){

    
    
    route::post('/comments', 'CommentsController@store');
    route::put('/comments/{comments}', 'CommentsController@update');
    route::delete('/comments/{comments}', 'CommentsController@destroy');

    
});