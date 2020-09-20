<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Counter;
use Illuminate\Support\Facades\Cache;

class CounterController extends Controller
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
        $counters = Cache::has('counters')
            ? Cache::get('counters')
            : Cache::rememberForever('counters', function () {
                return Counter::all();
            });
        return view('website::counter.index', compact('counters'));
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
        Counter::create($this->validateData());
        return redirect(websiteRedirectRoute('counter'));
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
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Counter $counter
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('website::counter.edit', compact('counter'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Counter $counter
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Counter $counter)
    {
        $counter->update($this->validateData());
        return redirect(websiteRedirectRoute('counter'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Counter $counter
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
        return redirect(websiteRedirectRoute('counter'));
    }

    /* Request Validation */
    private function validateData()
    {
        return request()->validate([
            'counter_name' => 'required|max:100',
            'count' => 'required|numeric',
            'counter_icon' => 'sometimes'
        ]);
    }
}
