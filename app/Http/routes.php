<?php

/*
|-------------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------------
*/


// ------------------ COUNSELOR FUNCTIONS (CRUD) -------------------------------

Route::get('/counselors/{counselor}/show', 'CounselorsController@show');

Route::get('/counselors/add', 'CounselorsController@add');
Route::post('/counselors/add', 'CounselorsController@store');

Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');

Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');
Route::patch('/counselors/{counselor}/edit', 'CounselorsController@update');


// -------------------- COUNSELOR SORTING --------------------------------------
// Sort by name is default
// This route is a reidrect to home.  Originally the 'home' route was '/counselors',
// but i decided to change it to this because it is easier for the user
Route::get('/counselors', 'CounselorsController@home');
Route::get('/home', 'CounselorsController@sortByName')->middleware('auth');

Route::get('/sortByDistrict', 'CounselorsController@sortByDistrict');

Route::get('/sortByTroop', 'CounselorsController@sortByTroop');


// --------------------- BADGE FUNCTIONS ---------------------------------------

Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
Route::post('/counselors/{counselor}/badges/add', 'BadgesController@store');



// --------------------- DISTRICT FUNCTIONS ------------------------------------

Route::get('/counselors/{counselor}/districts/add', 'DistrictsController@add');
Route::patch('/counselors/{counselor}/districts/add', 'DistrictsController@store');

Route::get('/badges/addBadge', 'BadgesController@addBadge');
Route::post('/badges/addBadge', 'BadgesController@storeBadge');


// ---------------------- SANDBOX ----------------------------------------------


Route::get('/sandbox/navbar', 'SandboxController@navbar');


// ------------------------- AUTH ----------------------------------------------

Route::auth();

Route::get('/', function() { return redirect('/login'); });
// sortByName is default for the home page.  Think of it like an 'index' method
