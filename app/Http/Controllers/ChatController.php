<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\ChatManager;

class ChatController extends Controller
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
        return view('dir.chat.index');
    }

    public function show($id){
        return view('dir.chat.show')
            ->withChat(ChatManager::find($id));
    }
}
