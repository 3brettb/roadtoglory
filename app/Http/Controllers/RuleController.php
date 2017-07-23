<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\RuleManager;

class RuleController extends Controller
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
        return view('dir.rule.index')
            ->withRules(RuleManager::all());
    }

    public function show($id){
        return view('dir.rule.show')
            ->withRule(RuleManager::find($id));
    }

    public function create(){
        return view('dir.rule.create');
    }

    public function store(Request $request){
        RuleManager::store($request);
    }

    public function edit($id){
        return view('dir.rule.edit')
            ->withRule(RuleManager::find($id));
    }

    public function update($id, Request $request){
        RuleManager::update($id, $request);
    }

    public function destroy($id){
        RuleManager::destroy($id);
    }
}
