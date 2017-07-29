<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\ResponseObject;
use App\Managers\TradeManager;
use App\Models\Team;
use App\Models\DraftPick;

class TradeController extends Controller
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

    public function items(Request $request){
        return TradeManager::items($request);
    }

    public function send(Request $request){
        return TradeManager::store($request);
    }
}