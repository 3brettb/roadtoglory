<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\AlertManager;

class AlertController extends Controller
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
        return view('dir.alert.index')
            ->withAlert(AlertManager::all());
    }

    public function show($id){
        return view('dir.alert.show')
            ->withAlert(AlertManager::find($id));
    }

    public function create(){
        return view('dir.alert.create');
    }

    public function store(Request $request){
        AlertManager::store($request);
    }

    public function edit($id){
        return view('dir.alert.edit')
            ->withAlert(AlertManager::find($id));
    }

    public function update($id, Request $request){
        AlertManager::update($id, $request);
    }

    public function destroy($id){
        AlertManager::destroy($id);
    }
}
