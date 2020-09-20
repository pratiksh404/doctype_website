<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Service;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APIserviceController extends Controller
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
        return Cache::has('services')
            ? Cache::get('services')
            : Cache::rememberForever('services', function () {
                return Service::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Service $service
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Service $service)
    {
        return Cache::has('service')
            ? Cache::get('service')
            : Cache::rememberForever('service', function () use ($service) {
                return $service;
            });
    }
}
