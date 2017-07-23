<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\PlayerManager;
use App\Models\Player;

class PlayerController extends Controller
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
        return view('dir.player.index')
            ->withPlayers(\App\Models\Resource\Players\PlayerData::all());
            //->withPlayers(Player::all());
    }

    public function show($id){
        return view('dir.player.show')
            ->withPlayer(\App\Models\Resource\Players\PlayerData::find($id));
            //->withPlayer(Player::find($id));
    }
}
