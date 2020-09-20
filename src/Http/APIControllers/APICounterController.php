<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Counter;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APICounterController extends Controller
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
        return Cache::has('counters')
            ? Cache::get('counters')
            : Cache::rememberForever('counters', function () {
                return Counter::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Counter $counter
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Counter $counter)
    {
        return Cache::has('counter')
            ? Cache::get('counter')
            : Cache::rememberForever('counter', function () use ($counter) {
                return $counter;
            });
    }
}
