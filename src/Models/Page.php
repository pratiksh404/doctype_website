<?php

namespace doctype_admin\Website\Models;

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
            Cache::forget('page'); // Single Page
        });
    }
}
