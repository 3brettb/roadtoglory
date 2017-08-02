<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Managers\PlayerManager;

class PlayerController extends Controller
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

    public function add(Request $request){
        PlayerManager::add($request);
    }
}