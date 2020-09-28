<?php

namespace doctype_admin\Website\Traits\Scopes;

trait ImageScopes
{
    // Normal Image
    public function scopeNormal($query)
    {
        return $query->where('image_type', 1);
    }

    // Vertical Image
    public function scopeVertical($query)
    {
        return $query->where('image_type', 2);
    }

    // Horizontal Image
    public function scopeHorizontal($query)
    {
        return $query->where('image_type', 3);
    }

    //  Video Thumbnail
    public function scopeVideoThumbnail($query)
    {
        return $query->where('image_type', 4);
    }

    // Slider Image
    public function scopeSlider($query)
    {
        return $query->where('image_type', 5);
    }
}
