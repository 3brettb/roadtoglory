<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trade;
use App\Managers\TradeManager;

class TradeController extends Controller
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
        return view('dir.trade.index')
            ->withTrades(TradeManager::all());
    }

    public function show($id){
        return view('dir.trade.show')
            ->withTrade(Trade::find($id)->load(['picks', 'players', 'teams']));
    }

    public function create(){
        return view('dir.trade.create');
    }

    public function store(Request $request){
        TradeManager::store($request);
    }

    public function edit($id){
        return view('dir.trade.edit')
            ->withTrade(TradeManager::find($id));
    }

    public function update($id, Request $request){
        TradeManager::update($id, $request);
    }

    public function destroy($id){
        TradeManager::destroy($id);
    }

    public function accept(Trade $trade){
        return TradeManager::accept($trade); 
    }

    public function reject(Trade $trade){
        return TradeManager::reject($trade);
    }
}
