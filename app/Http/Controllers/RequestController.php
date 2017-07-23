<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\RequestManager;

class RequestController extends Controller
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

    public function issues(){
        return view('dir.request.issues')
            ->withRequests(RequestManager::issues());
    }

    public function rules(){
        return view('dir.request.rules')
            ->withRequests(RequestManager::rules());
    }

    public function ir(){
        return view('dir.request.ir')
            ->withRequests(RequestManager::ir());
    }

    public function show($id){
        return view('dir.request.show')
            ->withRequests(RequestManager::find($id));
    }

    public function create(){
        return view('dir.request.create');
    }

    public function store(Request $request){
        RequestManager::store($request);
    }

    public function edit($id){
        return view('dir.request.edit')
            ->withRequest(RequestManager::find($id));
    }

    public function update($id, Request $request){
        RequestManager::update($id, $request);
    }

    public function destroy($id){
        RequestManager::destroy($id);
    }
}
