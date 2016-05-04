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

Route::get('/badges', 'BadgesController@index');

Route::get('/counselors', 'CounselorsController@index');

Route::get('/counselors/{counselor}/show', 'CounselorsController@show');

Route::get('/counselors/add', 'CounselorsController@add');

Route::post('/counselors/add', 'CounselorsController@store');

Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');

Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');

Route::patch('counselors/{counselor}/edit', 'CounselorsController@update');
