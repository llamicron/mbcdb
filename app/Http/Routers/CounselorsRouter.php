<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class CounselorsRouter implements RouterInterface {
    public static function setRoutes() {
      Route::get('/', 'CounselorsController@sortByName');
      Route::get('/home', function () {
        return redirect('/');
      });
      Route::get('/sortByDistrict', 'CounselorsController@sortByDistrict');
      Route::get('/sortByTroop', 'CounselorsController@sortByTroop');
      Route::get('/counselors', 'CounselorsController@home');
      Route::get('/counselors/add', 'CounselorsController@add');
			Route::post('/counselors/add', 'CounselorsController@store');
      Route::get('/counselors/{user}', 'CounselorsController@userCounselors');
      Route::get('/counselors/{counselor}/show', 'CounselorsController@show');
      Route::get('/counselors/{counselor}/edit', 'CounselorsController@edit');
      Route::patch('/counselors/{counselor}/edit', 'CounselorsController@update');
      Route::get('/counselors/{counselor}/remove', 'CounselorsController@remove');
      Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
      Route::post('/counselors/{counselor}/badges/add', 'BadgesController@store');
      // TODO: Fix this route
			Route::get('/counselors/{counselor}/badges/remove', 'BadgesController@removeForm');
			Route::post('/counselors/{counselor}/badges/remove', 'BadgesController@remove');
      Route::get('/counselors/{counselor}/districts/add', 'DistrictsController@add');
      Route::patch('/counselors/{counselor}/districts/add', 'DistrictsController@store');
      Route::get('/counselors/{counselor}/saveToUser', 'CounselorsController@saveToUser');
      Route::get('/saved', 'CounselorsController@viewSavedCounselors');

      Route::get('/counselors/{counselor}/badges/add', 'BadgesController@add');
    }
}
