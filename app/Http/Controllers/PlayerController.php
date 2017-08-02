<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\PlayerManager;
use App\Models\Player;
use App\Models\Resource\Players\Player as SystemPlayer;

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
        return view('dir.player.index');
    }

    public function show($id){
        return view('dir.player.show')
            ->withPlayer(SystemPlayer::find($id));
            //->withPlayer(Player::find($id));
    }

    public function move($id){
        return view('dir.player.move')
            ->withPlayer(SystemPlayer::find($id));
    }
}
