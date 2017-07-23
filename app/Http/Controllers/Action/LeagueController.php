<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeagueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function teams(Request $request){
        return league()->teams;
    }
}