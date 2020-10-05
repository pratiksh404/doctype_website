<?php

namespace doctype_admin\Website\Facades;

use Illuminate\Support\Facades\Facade;

class Image extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'website_image';
    }
}
