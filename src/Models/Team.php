<?php

namespace doctype_admin\Website\Models;

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
}
