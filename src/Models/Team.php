<?php

namespace doctype_admin\Website\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    protected $casts = [
        'phone_no' => 'array',
        'social_media' => 'array'
    ];
}
