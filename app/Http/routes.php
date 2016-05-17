<?php

/*
|-------------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------------
*/


// -------------------- STATIC PAGES -------------------------------------------

Route::get('/about', 'PagesController@about');

// -------------------- COUNSELOR SORTING --------------------------------------
// This route is a redirect to home.  Originally the 'home' route was '/counselors',
// but i decided to change it to this because it is easier for the user

// These routes are here because the order matters and i didn't know that.
// I would put them in their group below but it would break everything.

// Sort by name is default
// these 3 routes are the '/home' route, or redirect to it.
Route::get('/', 'CounselorsController@home');
Route::get('/counselors', 'CounselorsController@home');
Route::get('/home', 'CounselorsController@sortByName');
// other sorting functions
Route::get('/sortByDistrict', 'CounselorsController@sortByDistrict');
Route::get('/sortByTroop', 'CounselorsController@sortByTroop');

// add
// these routes belongs lower, but the route order matters, and i dont know how to fix it.
Route::get('/counselors/add', 'CounselorsController@add');
Route::post('/counselors/add', 'CounselorsController@store');


// Sort counselors by current authed user
Route::get('/counselors/{user}', 'CounselorsController@userCounselors');


// ------------------ COUNSELOR FUNCTIONS (CRUD) -------------------------------

Route::get('/counselors/{counselor}/show', 'CounselorsController@show');


// edit
Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');
Route::patch('/counselors/{counselor}/edit', 'CounselorsController@update');

// delete
Route::get('/counselors/{counselor}/confirmRemoval', 'CounselorsController@confirmRemoval');
Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');



// --------------------- BADGE FUNCTIONS ---------------------------------------
// this is a test change

Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
Route::post('/counselors/{counselor}/badges/add', 'BadgesController@store');

// TODO: remove (COMING SOON)

// ----------------------- ADMIN/USERS FUNCTIONS --------------------------------------
// functions that only admins have access to

// how admins access their 'dashboard' or homepage
// admin redirect to 'manageUsers', but 'admins' is a more managable uri to login with
Route::get('/admin-login', 'AdminsController@confirmAdmin');
Route::get('/users/manageUsers', 'AdminsController@manageUsers');

// show user
Route::get('/users/{user}/show', 'AdminsController@show');

Route::get('/users/{user}/confirmRemoval', 'AdminsController@confirmRemoval');
Route::get('/users/{user}/remove', 'AdminsController@delete');

Route::get('/users/{user}/setAdminWarning', 'AdminsController@setAdminWarning');
Route::get('/users/{user}/setAdmin', 'AdminsController@setAdmin');


// --------------------- DISTRICT FUNCTIONS ------------------------------------

Route::get('/counselors/{counselor}/districts/add', 'DistrictsController@add');
Route::patch('/counselors/{counselor}/districts/add', 'DistrictsController@store');

// ---------------------- SANDBOX and TESTS----------------------------------------------


Route::get('/sandbox', 'SandboxController@test');

// ------------------------- AUTH ----------------------------------------------

Route::auth();
