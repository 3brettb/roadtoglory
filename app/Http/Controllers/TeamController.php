<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\TeamManager;
use App\Models\Team;

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

    public function index(){
        return view('dir.team.index')
            ->withTeams(Team::all());
    }

    public function show($id){
        return view('dir.team.show')
            ->withTeam(Team::find($id));
    }

    public function create(){
        return view('dir.team.create');
    }

    public function store(Request $request){
        TeamManager::store($request);
    }

    public function edit($id){
        return view('dir.team.edit')
            ->withTeam(TeamManager::find($id));
    }

    public function update($id, Request $request){
        TeamManager::update($id, $request);
    }
}
