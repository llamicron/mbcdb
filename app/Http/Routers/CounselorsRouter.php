<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class CounselorsRouter implements RouterInterface {
    public static function setRoutes() {
      Route::get('/', 'CounselorsController@home');
      Route::get('/home', 'CounselorsController@sortByName');
      Route::get('/sortByDistrict', 'CounselorsController@sortByDistrict');
      Route::get('/sortByTroop', 'CounselorsController@sortByTroop');
      Route::get('/counselors', 'CounselorsController@home');
      Route::get('/counselors/add', 'CounselorsController@add');
      Route::post('/counselors/add', 'CounselorsController@store');
      Route::get('/counselors/{user}', 'CounselorsController@userCounselors');
      Route::get('/counselors/{counselor}/show', 'CounselorsController@show');
      Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');
      Route::patch('/counselors/{counselor}/edit', 'CounselorsController@update');
      Route::get('/counselors/{counselor}/confirmRemoval', 'CounselorsController@confirmRemoval');
      Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');
      Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
      Route::post('/counselors/{counselor}/badges/add', 'BadgesController@store');
      Route::get('/counselors/{counselor}/districts/add', 'DistrictsController@add');
      Route::patch('/counselors/{counselor}/districts/add', 'DistrictsController@store');
      Route::get('/admin-login', 'AdminsController@confirmAdmin');
      Route::get('/users/manageUsers', 'AdminsController@manageUsers');
    }
}
