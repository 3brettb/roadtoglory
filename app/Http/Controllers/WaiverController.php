<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\WaiverManager;

class WaiverController extends Controller
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
        return view('dir.waiver.index')
            ->withWaivers(WavierManager::all());
    }

    public function show($id){
        return view('dir.waiver.show')
            ->withWaiver(WaiverManager::show($id));
    }

    public function claim($id){
        return view('dir.waiver.claim')
            ->withClaim(WaiverManager::claim($id));
    }

    public function order(){
        return view('dir.waiver.order')
            ->withOrder(WaiverManager::order());
    }
}
