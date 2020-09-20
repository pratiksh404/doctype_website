<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Portfolio;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APIPortfolioController extends Controller
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
        return Cache::has('portfolios')
            ? Cache::get('portfolios')
            : Cache::rememberForever('portfolios', function () {
                return portfolio::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Portfolio $portfolio
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Portfolio $portfolio)
    {
        return Cache::has('portfolio')
            ? Cache::get('portfolio')
            : Cache::rememberForever('portfolio', function () use ($portfolio) {
                return $portfolio;
            });
    }
}
