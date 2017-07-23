<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\DraftManager;

class DraftController extends Controller
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
        return view('dir.draft.index');
    }

    public function show($id){
        return view('dir.draft.show')
            ->withDraft(DraftManager::find($id));
    }
}
