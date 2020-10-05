<?php

namespace doctype_admin\Website\Repositories;

use doctype_admin\Website\Contracts\ImageDataRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use doctype_admin\Website\Models\Image;

class ImageDataRepository implements ImageDataRepositoryInterface
{
    // Retrive All Images
    public function getAll()
    {
        return config('website.caching', true)
            ? (Cache::has('images') ? Cache::get('images') : Cache::rememberForever('images', function () {
                return Image::all();
            }))
            : Image::all();
    }

    // Retrive Normal Images
    public function getNormal()
    {
        return config('website.caching', true)
            ? (Cache::has('normal_images') ? Cache::get('normal_images') : Cache::rememberForever('key', function () {
                return Image::normal()->get();
            }))
            : Image::normal()->get();
    }

    // Retrives Vertical Images
    public function getVertical()
    {
        return config('website.caching', true)
            ? (Cache::has('vertical_images') ? Cache::get('vertical_images') : Cache::rememberForever('vertical_images', function () {
                return Image::vertical()->get();
            }))
            : Image::vertical()->get();
    }

    // Retives Horizontal Images
    public function getHorizontal()
    {
        return config('website.caching', true)
            ? (Cache::has('horizontal_images') ? Cache::get('horizontal_images') : Cache::rememberForever('horizontal_images', function () {
                return Image::horizontal()->get();
            }))
            : Image::horizontal()->get();
    }

    // Retrive Video Thumbnail
    public function getVideoThumbnail()
    {
        return config('website.caching', true)
            ? (Cache::has('video_thumbnail_images') ? Cache::get('video_thumbnail_images') : Cache::rememberForever('video_thumbnail_images', function () {
                return Image::videoThumbnail()->get();
            }))
            : Image::videoThumbnail()->get();
    }

    // Retrive Slider Images
    public function getSlider()
    {
        return config('website.caching', true)
            ? (Cache::has('slider_images') ? Cache::get('slider_images') : Cache::rememberForever('slider_images', function () {
                return Image::slider()->get();
            }))
            : Image::slider()->get();
    }
}
