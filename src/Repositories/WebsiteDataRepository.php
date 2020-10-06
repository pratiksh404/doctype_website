<?php

namespace doctype_admin\Website\Repositories;

use doctype_admin\Website\Contracts\WebsiteDataRepositoryInterface;
use doctype_admin\Website\Models\Faq;
use Illuminate\Support\Facades\Cache;
use doctype_admin\Website\Models\Page;
use doctype_admin\Website\Models\Plan;
use doctype_admin\Website\Models\Team;
use doctype_admin\Website\Models\Counter;
use doctype_admin\Website\Models\Service;
use doctype_admin\Website\Models\Portfolio;

class WebsiteDataRepository implements WebsiteDataRepositoryInterface
{
    // Retrive Counter
    public function counter()
    {
        return config('website.caching', true)
            ? Cache::has('counters') ? Cache::get('counters') : Cache::rememberForever('counters', function () {
                return Counter::all();
            })
            : Counter::all();
    }

    // Retrive FAQ
    public function faq()
    {
        return config('website.caching', true)
            ? Cache::has('faqs') ? Cache::get('faqs') : Cache::rememberForever('faqs', function () {
                return Faq::all();
            })
            : Faq::all();
    }

    // Retrive Page
    public function page()
    {
        return config('website.caching', true)
            ? Cache::has('pages') ? Cache::get('pages') : Cache::rememberForever('pages', function () {
                return Page::all();
            })
            : Page::all();
    }

    // Retrive Plan
    public function plan()
    {
        return config('website.caching', true)
            ? Cache::has('plans') ? Cache::get('plans') : Cache::rememberForever('plans', function () {
                return Plan::all();
            })
            : Plan::all();
    }

    // Retirve Portfolio
    public function portfolio()
    {
        return config('website.caching', true)
            ? Cache::has('portfolios') ? Cache::get('portfolios') : Cache::rememberForever('portfolios', function () {
                return Portfolio::all();
            })
            : Portfolio::all();
    }

    // Retrive Service
    public function service()
    {
        return config('website.caching', true)
            ? Cache::has('services') ? Cache::get('services') : Cache::rememberForever('services', function () {
                return Service::all();
            })
            : Service::all();
    }

    // Retrive Team
    public function team()
    {
        return config('website.caching', true)
            ? Cache::has('teams') ? Cache::get('teams') : Cache::rememberForever('teams', function () {
                return Team::all();
            })
            : Team::all();
    }
}
