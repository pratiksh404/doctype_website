<?php

return [
    /*
        |--------------------------------------------------------------------------
        | Website Route Prefix
        |--------------------------------------------------------------------------
        |
        | Backend Website Routes Prefix.
        | Default Prefix admin/website Recommeneded
        | 
        */
    'prefix' => 'admin/website',

    /*
        |--------------------------------------------------------------------------
        | Website API Route Prefix
        |--------------------------------------------------------------------------
        |
        | API endpoint prefix
        | 
        */
    'api_prefix' => 'api/website',

    /*
        |--------------------------------------------------------------------------
        | Doctype Admi Website Middlewares
        |--------------------------------------------------------------------------
        |
        | Backend Doctype Admin Website Middleware array
        | 
        | 
        */
    'middleware' => ['web', 'auth', 'activity', 'role:admin'],

    /*
        |--------------------------------------------------------------------------
        | Doctype Admi Website Middlewares
        |--------------------------------------------------------------------------
        |
        | Backend Doctype Admin Website Middleware array
        | 
        | 
        */
    'api_middleware' => ['auth:api'],
];
