<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\UserManager;

class UserController extends Controller
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
        return view('dir.user.index')
            ->withUsers(UserManager::all());
    }

    public function profile($id){
        return view('dir.user.profile')
            ->withUser(UserManager::profile($id));
    }
}
