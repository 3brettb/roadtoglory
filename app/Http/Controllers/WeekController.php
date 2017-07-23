<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\WeekManager;

class WeekController extends Controller
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
        return view('dir.week.index')
            ->withWeeks(WeekManager::all());
    }

    public function show($id){
        return view('dir.week.show')
            ->withWeek(WeekManager::show($id));
    }
}
