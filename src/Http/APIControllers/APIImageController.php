<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Image;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APIImageController extends Controller
{
    /**
     *
     *Lists the resorces
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        return Cache::has('images')
            ? Cache::get('images')
            : Cache::rememberForever('images', function () {
                return Image::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Image $image
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Image $image)
    {
        return $image;
    }
}
