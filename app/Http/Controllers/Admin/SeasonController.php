<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Managers\ActivityManager;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
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

    public function generate(){
        return view('dir.admin.season.generate');
    }
}
