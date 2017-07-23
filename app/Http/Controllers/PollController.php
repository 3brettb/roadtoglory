<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\PollManager;

class PollController extends Controller
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
        return view('dir.poll.index');
    }

    public function show($id){
        return view('dir.poll.show')
            ->withPoll(PollManager::find($id));
    }

    public function create(){
        return view('dir.poll.create');
    }

    public function store(Request $request){
        PollManager::store($request);
    }

    public function edit($id){
        return view('dir.poll.edit')
            ->withPoll(PollManager::find($id));
    }

    public function update($id, Request $request){
        PollManager::update($id, $request);
    }

    public function destroy($id){
        PollManager::destroy($id);
    }
}
