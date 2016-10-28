<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class AdminsRouter implements RouterInterface {
    public static function setRoutes() {

      Route::get('/admin', 'AdminsController@confirmAdmin');
      Route::get('/users/{user}/show', 'AdminsController@show');
      Route::get('/users/{user}/setAdmin', 'AdminsController@setAdmin');
			Route::get('/users/sortByName', 'AdminsController@sortByName');
			Route::get('/users/sortByEmail', 'AdminsController@sortByEmail');
			Route::get('/users/sortByPrivilege', 'AdminsController@sortByPrivilege');
			Route::get('/users/{user}/delete', 'AdminsController@delete');
			Route::post('/users/bulk', 'AdminsController@bulk');
    }
}
