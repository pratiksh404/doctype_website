<?php

namespace doctype_admin\Website\Facades;

use Illuminate\Support\Facades\Facade;

class Website extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'website';
    }
}
