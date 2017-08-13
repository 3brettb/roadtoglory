<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Managers\TeamManager;

class TeamController extends Controller
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

    public function update(Request $request){
        return TeamManager::update($request);
    }
}