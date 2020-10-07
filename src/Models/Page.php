<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Thumbnail;
    protected $guarded = [];

    protected $casts = [
        'meta_keywords' => 'array'
    ];

    /* Cache forget on saving or updating */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('pages'); //All Pages
        });

        static::deleting(function () {
            Cache::forget('pages');
        });
    }
}
