<?php

namespace doctype_admin\Website\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    // Portfolio Has Many Images
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /* Cache forget on saving or updating */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('portfolios');
            Cache::forget('portfolio');
        });
    }
}
