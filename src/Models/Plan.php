<?php

namespace doctype_admin\Website\Models;

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
}
