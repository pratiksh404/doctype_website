<?php

namespace doctype_admin\Website\Http\Controllers;

use doctype_admin\Website\Facades\Image as Doctype_adminImage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Image;
use doctype_admin\Website\Models\Portfolio;


class ImageController extends Controller
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
        $images = Doctype_adminImage::getAll();
        return view('website::image.index', compact('images'));
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
        $portfolios = Portfolio::all(['id', 'portfolio']);
        return view('website::image.create', compact('portfolios'));
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
        $image = Image::create($this->validateData());
        $this->uploadImage($image);
        return redirect(websiteRedirectRoute('image'));
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Image $image
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Image $image)
    {
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Image $image
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $portfolios = Portfolio::all(['id', 'portfolio']);
        return view('website::image.edit', compact('image', 'portfolios'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Image $image
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Image $image)
    {
        $image->update($this->validateData());
        return redirect(websiteRedirectRoute('image'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Image $image
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Image $image)
    {
        $image->hardDeleteWithParent('image');
        return redirect(websiteRedirectRoute('image'));
    }

    /* Request Validation */
    private function validateData()
    {
        return tap(
            request()->validate([
                'name' => 'sometimes|max:255',
                'image' => 'sometimes',
                'excerpt' => 'sometimes|max:1000',
                'portfolio_id' => 'numeric',
                'image_type' => 'required|numeric',
                'youtube_link' => 'sometimes|max:255',
                'image_description' => 'sometimes|max:1000',
                'redirect_link' => 'sometimes|max:255'
            ]),
            function () {
                request()->has('image') ? request()->validate(['image' => 'required|file|image']) : '';
            }
        );
    }

    // Upload Image
    private function uploadImage($img)
    {
        $multi =  request()->image_type == 5
            ?  [
                'storage' => config('website.slider_image_storage', 'uploads/website/slider'),
                'width' => config('website.slider_image_width', 800),
                'height' => config('website.slider_image_height', 600),
                'quality' => '90',
                'thumbnails' => [
                    [
                        'thumbnail-name' => 'medium',
                        'thumbnail-width' => config('website.slider_image_width', 800) / 2,
                        'thumbnail-height' => config('website.slider_image_height', 600) / 2,
                        'thumbnail-quality' => '60',
                    ]
                ]
            ] : [
                'storage' => $img->image_type == "Slider" ? 'uploads/website/normal_image' : 'uploads/website/portfolio/' . $img->portfolio->portfolio,
                'width' => $img->image_type == "Vertical" ? config('website.vertical_image_width', 400) : ($img->image_type == "Horizontal" ? config('website.horizontal_image_width', 600) : config('website.normal_image_hw', 600)),
                'height' => $img->image_type == "Vertical" ? config('website.vertical_image_height', 600) : ($img->image_type == "Horizontal" ? config('website.horizontal_image_height', 400) : config('website.normal_image_hw', 600)),
                'quality' => '80',
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
}
