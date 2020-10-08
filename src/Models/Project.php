<?php

namespace doctype_admin\Website\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
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
