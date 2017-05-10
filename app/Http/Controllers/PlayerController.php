<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ResourceModels\Players\Player;

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

    /**
     * Show the player index.
     * index route
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = Player::all();
        return view('players.index')->withPlayers($players);
    }

    /**
     * Show a given player.
     * show route
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('players.show')->withPlayer($player);
    }
}
