<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Resources\Common\Permissions\UserPermissions;

class Permission extends Model
{
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'league_id', 'value',
    ];

    public function test()
    {
        return $this->permission_set;
    }

    public function can($verb)
    {
        if($this->permission_set == null){
            $this->permission_set = new UserPermissions($this);
        }
        return $this->permission_set->can($verb);
    }

    public function routeto(){
        return url("/permissions");
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}