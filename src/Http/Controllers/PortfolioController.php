<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
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
        $portfolios = Cache::has('portfolios')
            ? Cache::get('portfolios')
            : Cache::rememberForever('portfolios', function () {
                return Portfolio::all();
            });
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
        if (request()->has('images')) {
            $this->validateImage();
            foreach (request()->images as $image) {
                $img = $portfolio->images()->create([
                    'image_type' => request()->has('image_type') ? request()->image_type : 1,
                    'image' => $image
                ]);
                $this->uploadImage($img, $image, $portfolio);
            }
        }
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

    // Upload Image
    private function uploadImage($img, $portfolio_image, $portfolio)
    {
        $multi = [
            'storage' => config('website.portfolio_image_storage', 'uploads/website/portfolio') . '/' . $portfolio->portfolio,
            'width' => $img->image_type == "Vertical" ? config('website.vertical_image_width', 400) : ($img->image_type == "Horizontal" ? config('website.horizontal_image_width', 600) : config('website.normal_image_hw', 600)),
            'height' => $img->image_type == "Vertical" ? config('website.vertical_image_height', 600) : ($img->image_type == "Horizontal" ? config('website.horizontal_image_height', 400) : config('website.normal_image_hw', 600)),
            'quality' => '80',
            'image' => $portfolio_image,
            'thumbnails' => [
                [
                    'thumbnail-name' => 'medium',
                    'thumbnail-width' => $img->image_type == "Vertical" ? config('website.vertical_image_width', 400) / 2 : ($img->image_type == "Horizontal" ? config('website.horizontal_image_width', 600) / 2 : config('website.normal_image_hw', 600) / 2),
                    'thumbnail-height' => $img->image_type == "Vertical" ? config('website.vertical_image_height', 600) / 2 : ($img->image_type == "Horizontal" ? config('website.horizontal_image_height', 400) / 2 : config('website.normal_image_hw', 600) / 2),
                    'thumbnail-quality' => '50',
                ],
                [
                    'thumbnail-name' => 'small',
                    'thumbnail-width' => $img->image_type == "Vertical" ? config('website.vertical_image_width', 400) / 2 : ($img->image_type == "Horizontal" ? config('website.horizontal_image_width', 600) / 4 : config('website.normal_image_hw', 600) / 4),
                    'thumbnail-height' => $img->image_type == "Vertical" ? config('website.vertical_image_height', 600) / 2 : ($img->image_type == "Horizontal" ? config('website.horizontal_image_height', 400) / 4 : config('website.normal_image_hw', 600) / 4),
                    'thumbnail-quality' => '30',
                ]
            ]
        ];

        return $img->makeThumbnail('image', $multi);
    }

    // Validate Mass Assigned Image
    private function validateImage()
    {
        request()->has('images') ? request()->validate([
            'images' => 'sometimes',
            'images.*' => 'file|image|max:3000'
        ]) : false;
    }
}
