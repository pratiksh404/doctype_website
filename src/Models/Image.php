<?php

namespace doctype_admin\Website\Models;

use doctype_admin\Website\Traits\Scopes\ImageScopes;
use Illuminate\Support\Facades\Cache;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use Thumbnail;
    use ImageScopes;


    protected $guarded = [];

    public function getImageTypeAttribute($attribute)
    {
        return [
            1 => 'Normal',
            2 => 'Vertical',
            3 => 'Horizontal',
            4 => 'Video',
            5 => 'Slider'
        ][$attribute];
    }

    // Image Belongs To Portfolio
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    /* Cache forget on saving or updating and deleting */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKeys();
        });

        static::deleting(function () {
            self::cacheKeys();
        });
    }

    // Cache Keys
    private static function cacheKeys()
    {
        Cache::forget('images');
        Cache::forget('normal_images');
        Cache::forget('vertical_images');
        Cache::forget('horizontal_images');
        Cache::forget('video_thumbnail_images');
        Cache::forget('slider_images');
    }
}
