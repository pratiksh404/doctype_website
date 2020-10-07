<?php

namespace doctype_admin\Website\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    protected $casts = [
        "plan_services" => 'array',
    ];

    public function getPlanPeriodAttribute($attribute)
    {
        return [
            1 => 'One Time Payment',
            2 => 'Day',
            3 => 'Week',
            4 => 'Month',
            5 => 'Year'
        ][$attribute];
    }

    /* Cache forget on saving or updating and deleting */
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            Cache::forget('plans');
        });

        static::deleting(function () {
            Cache::forget('plans');
        });
    }
}
