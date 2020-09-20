<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Thumbnail;

    protected $guarded = [];

    protected $casts = [
        'phone_no' => 'array',
        'social_media' => 'array'
    ];

    /* Cache forget on saving or updating */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('teams');
            Cache::forget('team');
        });
    }
}
