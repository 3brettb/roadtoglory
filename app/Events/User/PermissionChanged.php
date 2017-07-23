<?php

namespace App\Events\User;

use App\Models\Permission;
use Illuminate\Queue\SerializesModels;

class PermissionChanged
{
    use SerializesModels;

    public $permission;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
}