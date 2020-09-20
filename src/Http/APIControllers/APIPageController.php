<?php

namespace doctype_admin\Website\Http\APIControllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use doctype_admin\Website\Models\Page;

class APIPageController extends Controller
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
        return Cache::has('pages')
            ? Cache::get('pages')
            : Cache::rememberForever('pages', function () {
                return Page::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Page $page
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Page $page)
    {
        return Cache::has('page')
            ? Cache::get('page')
            : Cache::rememberForever('page', function () use ($page) {
                return $page;
            });
    }
}
