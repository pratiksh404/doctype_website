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
}
