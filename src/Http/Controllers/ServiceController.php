<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Service;
use doctype_admin\Website\Facades\Website;

class ServiceController extends Controller
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
        $services = Website::service();
        return view('website::service.index', compact('services'));
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
        return view('website::service.create');
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
        $service = Service::create($this->validateData());
        return redirect(websiteRedirectRoute('service'));
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
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Service $service
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('website::service.edit', compact('service'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Service $service
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Service $service)
    {
        $service->update($this->validateData());
        return redirect(websiteRedirectRoute('service'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Service $service
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(websiteRedirectRoute('service'));
    }

    /* Request Validation */
    private function validateData()
    {
        return request()->validate([
            'service_name' => 'required|max:100',
            'service_excerpt' => 'required|max:2000',
            'service_redirect_link' => 'sometimes|max:255',
            'service_icon' => 'sometimes|max:255'
        ]);
    }
}
