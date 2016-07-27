<?php

namespace App\Http\Routers;

use Route; 

class SearchRouter implements RouterInterface {
    public static function setRoutes() {
      Route::post('/search', 'SearchController@searchCounselors');
    }
}
