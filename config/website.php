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

    /*
        |--------------------------------------------------------------------------
        | Doctype Admin Website Image Management
        |--------------------------------------------------------------------------
        | 
        */
    // Image Quality
    'image_quality' => 80,

    //Portfolio Image Storage
    'portfolio_image_storage' => 'uploads/website/portfolio',

    //Slider Image Storage
    'slider_image_storage' => 'uploads/website/slider',

    // Vertical Image
    'vertical_image_width' => 400,
    'vertical_image_height' => 600,

    // Horizontal Image
    'horizontal_image_width' => 600,
    'horizontal_image_height' => 400,

    // Slider Image
    'slider_image_width' => 800,
    'slider_image_height' => 600,

    // Normal Image Height/Width
    'normal_image_hw' => 600,
];
