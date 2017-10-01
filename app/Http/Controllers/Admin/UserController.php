<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Managers\ActivityManager;
use App\Managers\AdminManager;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function permissions()
    {
        return view('dir.admin.users.permissions');
    }

    public function permission_update(Request $request)
    {
        AdminManager::update_permissions($request);
    }

    public function create()
    {
        return view('dir.admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email'
        ]);
        league()->users()->create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => isset($request['phone']) ? $request['phone'] : null,
            'password' => '$2$10$'.str_random(53)
        ]);
        return redirect()->back()->withErrors(["User Added Successfully (".$request['email'].")"]);
    }
}
