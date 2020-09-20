<?php

namespace doctype_admin\Website\Http\APIControllers;

use doctype_admin\Website\Models\Team;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class APITeamController extends Controller
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
        return Cache::has('teams')
            ? Cache::get('teams')
            : Cache::rememberForever('teams', function () {
                return Team::all();
            });
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
        return Cache::has('team')
            ? Cache::get('team')
            : Cache::rememberForever('team', function () use ($team) {
                return $team;
            });
    }
}
