<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use doctype_admin\Website\Models\Project;
use doctype_admin\Website\Facades\Website;

class ProjectController extends Controller
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
        $projects = Website::project();
        return view('website::project.index', compact('projects'));
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
        return view('website::project.create');
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
        $project = Project::create($this->validateData());
        $this->uploadImg($project);
        return redirect(websiteRedirectRoute('project'));
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Project $project
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Project $project)
    {
        return view('website::project.show', compact('project'));
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Project $project
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('website::project.edit', compact('project'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Project $project
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Project $project)
    {
        $project->update($this->validateData());
        $this->uploadImg($project);
        return redirect(websiteRedirectRoute('project'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Project $project
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Project $project)
    {
        $project->image ? $project->hardDelete('image') : '';
        $project->delete();
        return redirect(websiteRedirectRoute('project'));
    }

    /* Request Validation */
    private function validateData()
    {
        return tap(
            request()->validate([
                'name' => 'required|max:100',
                'excerpt' => 'required|max:1000',
                'description' => 'sometimes|max:5000',
                'image' => 'image|max:3000'
            ]),
            function () {
                request()->has('image') ? request()->validate(['image' => 'file|image|max:3000']) : '';
            }
        );
    }

    // Upload Image
    private function uploadImg($project)
    {
        if (request()->has('image')) {
            $thumbnails = [
                'storage' => 'uploads/website/project',
                'width' => '600',
                'height' => '600',
                'quality' => '70',
                'thumbnails' => [
                    [
                        'thumbnail-name' => 'small',
                        'thumbnail-width' => '300',
                        'thumbnail-height' => '300',
                        'thumbnail-quality' => '40'
                    ]
                ]
            ];
            $project->makeThumbnail('image', $thumbnails);
        }
    }
}
