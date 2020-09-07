<?php

namespace doctype_admin\Website\Models;

use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use Thumbnail;
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
}
