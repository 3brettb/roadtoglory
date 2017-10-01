<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Managers\ActivityManager;
use App\Http\Controllers\Controller;
use App\User;

class TeamController extends Controller
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

    public function create()
    {
        return view('dir.admin.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'mascot' => 'required|max:255',
            'email' => 'required|email|exists:users,email'
        ]);
        $user = User::where('email', $request['email'])->first();
        $user->teams()->create([
            'name' => $request['name'],
            'mascot' => $request['mascot'],
            'league_id' => league()->id,
        ]);
        return redirect()->back()->withErrors(["Team Added Successfully (".$request['name']." ".$request['mascot'].")"]);
    }
}
