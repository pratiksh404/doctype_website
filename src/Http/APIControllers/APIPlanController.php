<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Plan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APIPlanController extends Controller
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
        return Cache::has('plans')
            ? Cache::get('plans')
            : Cache::rememberForever('plans', function () {
                return Plan::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Plan $plan
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Plan $plan)
    {
        return Cache::has('plan')
            ? Cache::get('plan')
            : Cache::rememberForever('plan', function () use ($plan) {
                return $plan;
            });
    }
}
