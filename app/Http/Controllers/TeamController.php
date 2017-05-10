<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the league standings.
     * index route
     *
     * @return \Illuminate\Http\Response
     */
    public function standings()
    {
        return view('team.standings');
    }

    /**
     * Show a given team.
     * show route
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.show')->withTeam($team);
    }
}
