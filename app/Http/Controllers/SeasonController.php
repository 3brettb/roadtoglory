<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\SeasonManager;

class SeasonController extends Controller
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
        return view('dir.season.index');
    }

    public function show($id){
        return view('dir.season.show')
            ->withSeason(SeasonManager::find($id));
    }
}
