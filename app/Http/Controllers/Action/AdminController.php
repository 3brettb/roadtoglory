<?php

namespace App\Http\Controllers\Action;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Managers\AdminManager;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:api', 'admin']);
    }

    public function permission_update(Request $request)
    {
        AdminManager::update_permissions($request);
    }
}