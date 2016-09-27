<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class AuthRouter implements RouterInterface {
    public static function setRoutes() {

      Route::auth();
      Route::get('/notAdmin', function () {
        return view('errors.403');
      });
    }
}
