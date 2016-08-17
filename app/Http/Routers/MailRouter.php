<?php

namespace App\Http\Routers;

use Route; // Route facade (Illuminate\Support\Facades\Route)

class MailRouter implements RouterInterface {
    public static function setRoutes() {

			Route::get('/users/verify', 'MailController@verify');

		}
}
