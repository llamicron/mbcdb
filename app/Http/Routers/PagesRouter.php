<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)
use App\User;

class PagesRouter implements RouterInterface {
    public static function setRoutes() {

      Route::get('/about', 'PagesController@about');
			Route::get('/users/self/edit', function () {
				return view('users.self');
			});
			Route::post('/users/{user}/edit', 'PagesController@edit');
			Route::get('/feedback', 'PagesController@feedback');
      Route::get('/intro', 'PagesController@intro');
    }
}
