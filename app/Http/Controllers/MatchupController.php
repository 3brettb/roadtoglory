<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matchup;

class MatchupController extends Controller
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
        return view('dir.matchup.index')
            ->withMatchups(Matchup::all());
    }

    public function show($id){
        return view('dir.matchup.show')
            ->withMatchup(Matchup::find($id));
    }

    public function find(){
        // Get and Return most recent matchup
        dd(request()->team);
    }
}
