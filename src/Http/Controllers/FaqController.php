<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Faq;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
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
        $faqs = Cache::has('faqs')
            ? Cache::get('faqs')
            : Cache::rememberForever('faqs', function () {
                return Faq::all();
            });
        return view('website::faq.index', compact('faqs'));
    }

    /**
     *
     *Create view of resource
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        //
    }

    /**
     *
     *Creates the resource
     *
     *@param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        Faq::create($this->validateData());
        return redirect(websiteRedirectRoute('faq'));
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
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Faq $faq
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('website::faq.edit', compact('faq'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Faq $faq
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validateData());
        return redirect(websiteRedirectRoute('faq'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Faq $faq
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect(websiteRedirectRoute('faq'));
    }

    /* Request Validation */
    private function validateData()
    {
        return request()->validate([
            'question' => 'required|max:255',
            'answer' => 'required|max:5000',
        ]);
    }
}
