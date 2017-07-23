<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\ActivityManager;

class ActivityController extends Controller
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
        return view('dir.activity.index')
            ->withActivities(ActivityManager::all());
    }

    public function show($id){
        return view('dir.activity.index')
            ->withActivity(ActivityManager::find($id));
    }
}
