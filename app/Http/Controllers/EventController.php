<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\EventManager;

class EventController extends Controller
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

    public function calendar(){
        return view('dir.event.calendar')
            ->withEvents(EventManager::all());
    }

    public function show($id){
        return view('dir.event.show')
            ->withEvent(EventManager::find($id));
    }

    public function create(){
        return view('dir.event.create');
    }

    public function store(Request $request){
        EventManager::store($request);
    }

    public function edit($id){
        return view('dir.event.edit')
            ->withEvent(EventManager::find($id));
    }

    public function update($id, Request $request){
        EventManager::update($id, $request);
    }

    public function destroy($id){
        EventManager::destroy($id);
    }
}
