<?php

namespace doctype_admin\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Counter extends Model
{
    protected $guarded = [];

    /* Cache forget on saving or updating */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('counters');
        });
    }
}
