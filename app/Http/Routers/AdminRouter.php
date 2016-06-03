<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class AdminRouter implements RouterInterface {
    public static function setRoutes() {

      Route::get('/admin', 'AdminsController@confirmAdmin');
      Route::get('/users/{user}/show', 'AdminsController@show');
      Route::get('/users/{user}/confirmRemoval', 'AdminsController@confirmRemoval');
      Route::get('/users/{user}/remove', 'AdminsController@delete');
      Route::get('/users/{user}/setAdminWarning', 'AdminsController@setAdminWarning');
      Route::get('/users/{user}/setAdmin', 'AdminsController@setAdmin');

    }
}
