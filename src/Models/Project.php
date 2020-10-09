<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Thumbnail;

    protected $guarded = [];

    /* Cache forget on saving or updating and deleting */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('projects');
        });

        static::deleting(function () {
            Cache::forget('projects');
        });
    }
}
