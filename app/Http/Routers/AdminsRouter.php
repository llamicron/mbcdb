<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class AdminsRouter implements RouterInterface {
    public static function setRoutes() {

      Route::get('/admin', 'AdminsController@confirmAdmin');
      Route::get('/users/{user}/show', 'AdminsController@show');
      Route::get('/users/{user}/confirmRemoval', 'AdminsController@confirmRemoval');
      Route::get('/users/{user}/remove', 'AdminsController@delete');
      Route::get('/users/{user}/setAdminWarning', 'AdminsController@setAdminWarning');
      Route::get('/users/{user}/setAdmin', 'AdminsController@setAdmin');

			Route::get('/users/sortByName', 'AdminsController@sortByName');
			Route::get('/users/sortByEmail', 'AdminsController@sortByEmail');
			Route::get('/users/sortByPrivilege', 'AdminsController@sortByPrivilege');

			Route::get('/users/{user}/delete', 'AdminsController@confirmDelete');
			Route::post('/users/{user}/delete', 'AdminsController@deleteUser');

			Route::post('/users/bulk', 'AdminsController@bulk');
    }
}
