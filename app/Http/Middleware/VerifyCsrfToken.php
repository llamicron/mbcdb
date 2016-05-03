<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;


// If you are getting a token mismatch exception, you can add the uri to the array below
// and laravel wont validate it.  NOT SECURE, or recommended, but its a temporary workaround
class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/counselors/add',
        '/counselors/{counselor}/edit'
    ];
}
