<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Resources\Common\Permissions\UserPermissions;

class AdminPolicy
{
    use HandlesAuthorization;

    private $permissions;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->permissions = new UserPermissions();
    }

    public function accessAdminPortal(User $user)
    {
        $admin = $this->permissions->can("ADMIN");
        $manager = $this->permissions->can("MANAGER");
        $portal = $this->permissions->can("PORTAL_ACCESS");
        return $admin | $manager | $portal;
    }
}
