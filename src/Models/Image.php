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

    /* Cache forget on saving or updating */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('images');
        });
    }
}
