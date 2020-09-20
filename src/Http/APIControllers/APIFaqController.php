<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Faq;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APIFaqController extends Controller
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
        return Cache::has('faqs')
            ? Cache::get('faqs')
            : Cache::rememberForever('faqs', function () {
                return Faq::all();
            });
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Faq $faq
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Faq $faq)
    {
        return Cache::has('faq')
            ? Cache::get('faq')
            : Cache::rememberForever('faq', function () use ($faq) {
                return $faq;
            });
    }
}
