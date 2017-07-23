<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\MessageManager;
use App\Models\Message;

class MessageController extends Controller
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
        return view('dir.message.index');
    }

    public function inbox(){
        return view('dir.message.inbox');
    }

    public function show($id){
        return view('dir.message.show')
            ->withMessage(Message::find($id));
    }

    public function create(){
        return view('dir.message.create');
    }

    public function email(){
        return view('dir.message.email');
    }

    public function store(Request $request){
        MessageManager::store($request);
    }

    public function edit($id){
        return view('dir.messsage.edit')
            ->withMessage(Message::find($id));
    }

    public function update($id, Request $request){
        MessageManager::update($id, $request);
    }

    public function destroy($id){
        MessageManager::destroy($id);
    }
}
