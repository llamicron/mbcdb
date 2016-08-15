<?php

namespace App\Http\Routers;

use Route;

class SearchRouter implements RouterInterface {
    public static function setRoutes() {
			Route::post("/searchCounselors", 'SearchController@searchCounselors');
			Route::post('/searchOther', 'SearchController@searchOther');
			Route::get('/noResults', 'SearchController@noResults');
			Route::get('/searchStub', 'SearchController@searchStub');
		}
}
