<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('cube_summation', [
    'as' => 'cube_summation', 'uses' => 'CubeSummationController@showCubeSummation'
]);

Route::post('cube_summation', [
    'as' => 'cube_summation', 'uses' => 'CubeSummationController@cubeSummationFromFile'
]);
