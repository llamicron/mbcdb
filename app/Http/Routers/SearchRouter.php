<?php

namespace App\Http\Routers;

use Route;

class SearchRouter implements RouterInterface {
    public static function setRoutes() {
			Route::post("/search", 'SearchController@search');
			Route::get('/noResults', 'SearchController@noResults');
			Route::get('/searchStub', 'SearchController@searchStub');
		}
}
