<?php

// this is for static pages like "/about"

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class PagesRouter implements RouterInterface {
    public static function setRoutes() {
      Route::get('/about', 'PagesController@about');
    }
}
