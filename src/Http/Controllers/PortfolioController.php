<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Portfolio;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::all();
        return view('website::portfolio.index', compact('portfolios'));
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
        return view('website::portfolio.create');
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
        $portfolio = Portfolio::create($this->validateData());
        return redirect(websiteRedirectRoute('portfolio'));
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Portfolio $portfolio
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Page $portfolio)
    {
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Portfolio $portfolio
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('website::portfolio.edit', compact('portfolio'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Portfolio $portfolio
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $portfolio->update($this->validateData());
        return redirect(websiteRedirectRoute('portfolio'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Portfolio $portfolio
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect(websiteRedirectRoute('portfolio'));
    }

    /* Request Validation */
    private function validateData()
    {
        return request()->validate([
            'portfolio' => 'required|max:100',
            'portfolio_description' => 'max:1000',
        ]);
    }
}
