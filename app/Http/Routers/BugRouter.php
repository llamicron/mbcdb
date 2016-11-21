<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class BugRouter implements RouterInterface {
    public static function setRoutes() {
      Route::post('/feedback', 'BugController@submitIssue');
    }
}
