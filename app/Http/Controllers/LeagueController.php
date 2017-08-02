<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\LeagueManager;

class LeagueController extends Controller
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
        return view('dir.league.index')
            ->withLeagues(LeagueManager::all());
    }

    public function dashboard(){
        return view('dir.league.dashboard');
    }

    public function standings(){
        return view('dir.league.standings');
    }

    public function rankings(){
        return view('dir.league.rankings');
    }

    public function permissions(){
        return view('dir.league.permissions')
            ->withUsers(LeagueManager::users());
    }

    public function save_permissions(Request $request){
        PermissionManager::update($request);
    }

    public function create(){
        return view('dir.league.create');
    }

    public function store(Request $request){
        LeagueManager::store($request);
    }

    public function settings(){
        return view('dir.league.settings');
    }

    public function edit(){
        return view('dir.league.edit')
            ->withSettings(LeagueManager::settings());
    }

    public function update(Request $request){
        LeagueManager::update($request);
    }
}
