<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\User;
use App\Resources\Common\Permissions\UserPermissions;

class AdminManager extends Manager
{
    static function update_permissions($request)
    {
        $user = User::find($request['userid']);
        $permissions = new UserPermissions($user);
        $permissions->set($request['bit'], $request['value']);
    }
}