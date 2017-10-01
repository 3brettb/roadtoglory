<?php

namespace App\Http\ViewComposers\Admin\Users;

use Illuminate\View\View;

use App\User;
use App\Resources\Common\Permissions\UserPermissions;

class Permissions
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('users', $this->users);
    }

    private function init(){
        $this->users = $this->getUsers();
    }

    private function getUsers()
    {
        $users = league()->users;
        foreach($users as $user)
        {
            $user->permission = new UserPermissions($user);
        }
        return $users;
    }
}