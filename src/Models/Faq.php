<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded = [];

    /* Cache forget on saving or updating and deleting*/
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('faqs');
        });

        static::deleting(function () {
            Cache::forget('faqs');
        });
    }
}
