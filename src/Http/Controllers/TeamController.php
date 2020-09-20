<?php

namespace doctype_admin\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use doctype_admin\Website\Models\Team;

class TeamController extends Controller
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
        $teams = Cache::has('teams')
            ? Cache::get('teams')
            : Cache::rememberForever('teams', function () {
                return Team::all();
            });
        return view('website::team.index', compact('teams'));
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
        return view('website::team.create');
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
        $team = Team::create($this->validateData());
        $this->uploadImg($team);
        return redirect(websiteRedirectRoute('team'));
    }

    /**
     *
     *Shows the resource
     *@param doctype_admin\Website\Models\Team $team
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function show(Team $team)
    {
        //
    }


    /**
     *
     *Edit view of resource
     *
     * @param @param doctype_admin\Website\Models\Team $team
     * 
     *@return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('website::team.edit', compact('team'));
    }

    /**
     *
     *Updates the resource
     *
     * @param @param doctype_admin\Website\Models\Team $team
     * 
     * @param \Illuminate\Http\Request $request
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function update(Request $request, Team $team)
    {
        $team->update($this->validateData());
        $this->uploadImg($team);
        return redirect(websiteRedirectRoute('team'));
    }

    /**
     *
     *Deletes the resource
     *
     * @param @param doctype_admin\Website\Models\Team $team
     *
     *@return \Illuminate\Http\Response
     *
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect(websiteRedirectRoute('team'));
    }

    /* Request Validation */
    private function validateData()
    {
        return tap(
            request()->validate([
                'name' => 'required|max:100',
                'designation' => 'required',
                'phone_no' => 'sometimes',
                'social_media' => 'sometimes',
                'description' => 'sometimes|max:5000'
            ]),
            function () {
                request()->has('image') ? request()->validate(['image' => 'file|image|max:3000']) : '';
            }
        );
    }

    // Upload Image
    private function uploadImg($team)
    {
        if (request()->has('image')) {
            $thumbnails = [
                'storage' => 'uploads/website/team',
                'width' => '400',
                'height' => '600',
                'quality' => '70',
            ];
            $team->uploadImage('image', $thumbnails);
        }
    }
}
