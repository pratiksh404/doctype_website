<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Page;

class PageController extends Controller
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
        $pages = Page::all();
        return view('website::page.index', compact('pages'));
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
        return view('website::page.create');
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
        $page = Page::create($this->validateData());
        $this->uploadImage($page);
        return redirect(websiteRedirectRoute('page'));
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Page $page
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Page $page)
    {
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Page $page
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('website::page.edit', compact('page'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Page $page
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Page $page)
    {
        $page->update($this->validateData());
        $this->uploadImage($page);
        return redirect(websiteRedirectRoute('page'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Page $page
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect(websiteRedirectRoute('page'));
    }

    /* Request Validation */
    private function validateData()
    {
        return tap(
            request()->validate([
                'title' => 'required|max:100',
                'body' => 'required',
                'meta_title' => 'sometimes|max:100',
                'meta_keywords' => 'sometimes|max:255',
                'meta_description' => 'sometimes|max:255'
            ]),
            function () {
                request()->has('meta_image') ? request()->validate(['meta_image' => 'file|image|max:3000']) : '';
            }
        );
    }

    // Upload Image
    private function uploadImage($page)
    {
        if (request()->has('meta_image')) {
            $thumbnails = [
                'storage' => 'uploads/website/page/' . $page->title,
                'width' => '600',
                'height' => '400',
                'quality' => '70',
                'thumbnails' => [
                    [
                        'thumbnail-name' => 'small',
                        'thumbnail-width' => '300',
                        'thumbnail-height' => '150',
                        'thumbnail-quality' => '30'
                    ]
                ]
            ];
            $page->makeThumbnail('meta_image', $thumbnails);
        }
    }
}
