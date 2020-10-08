<?php

namespace doctype_admin\Website\Http\Controllers;

use doctype_admin\Website\Facades\Website;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Plan;

class PlanController extends Controller
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
        $plans = Website::plan();
        return view('website::plan.index', compact('plans'));
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
        return view('website::plan.create');
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
        $plan = Plan::create($this->validateData());
        return redirect(websiteRedirectRoute('plan'));
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
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Plan $plan
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('website::plan.edit', compact('plan'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Plan $plan
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Plan $plan)
    {
        $plan->update($this->validateData());
        return redirect(websiteRedirectRoute('plan'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Plan $plan
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect(websiteRedirectRoute('plan'));
    }

    /* Request Validation */
    private function validateData()
    {
        return request()->validate([
            'plan_name' => 'required|max:100',
            'plan_period' => 'required|numeric',
            'plan_price' => 'required',
            'plan_currency_symbol' => 'sometimes',
            'plan_color' => 'sometimes',
            'plan_services' => 'required'
        ]);
    }
}
