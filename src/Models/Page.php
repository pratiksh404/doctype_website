<?php

namespace doctype_admin\Website\Models;

use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Thumbnail;
    protected $guarded = [];

    protected $casts = [
        'meta_keywords' => 'array'
    ];
}
