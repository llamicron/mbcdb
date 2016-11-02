<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class AdminsRouter implements RouterInterface {
    public static function setRoutes() {

      Route::get('/admin', 'AdminsController@confirmAdmin');
      Route::get('/users/{user}/setAdmin', 'AdminsController@setAdmin');
      Route::get('/users/{user}/show', 'AdminsController@show');
			Route::get('/users/{user}/delete', 'AdminsController@delete');
      Route::get('/usersEmails', 'AdminsController@getUsersEmails');
    }
}
