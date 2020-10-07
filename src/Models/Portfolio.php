<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    // Portfolio Has Many Images
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /* Cache forget on saving or updating and deleting */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('portfolios');
        });

        static::deleting(function () {
            Cache::forget('portfolios');
        });
    }
}
