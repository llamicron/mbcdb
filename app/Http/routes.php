<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// ------------------ COUNSELOR FUNCTIONS (CRUD) ------------------------------

Route::get('/counselors/{counselor}/show', 'CounselorsController@show');

Route::get('/counselors/add', 'CounselorsController@add');
Route::post('/counselors/add', 'CounselorsController@store');

Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');

Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');
Route::patch('/counselors/{counselor}/edit', 'CounselorsController@update');

// -------------------- COUNSELOR SORTING -----------------------------------
// Sort by name is default
Route::get('/counselors', "CounselorsController@sortByName");

Route::get('/counselors/sortByName', 'CounselorsController@sortByName');

Route::get('/counselors/sortByDistrict', 'CounselorsController@sortByDistrict');

Route::get('/counselors/sortByTroop', 'CounselorsController@sortByTroop');
// --------------------- BADGE FUNCTIONS ------------------------------------

Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
Route::post('/counselors/{counselor}/badges/add', 'BadgesController@store');

// --------------------- DISTRICT FUNCTIONS ------------------------------------

Route::get('/counselors/{counselor}/districts/add', 'DistrictsController@add');
Route::patch('/counselors/{counselor}/districts/add', 'DistrictsController@store');

Route::get('/badges/addBadge', 'BadgesController@addBadge');
Route::post('/badges/addBadge', 'BadgesController@storeBadge');
