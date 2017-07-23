<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as HttpRequest;

class Request extends Model
{
    protected $table = 'requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'user_id', 'league_id', 'status', 'reference_type', 'reference_id', 'type_id',
    ];

    public function routeto(){
        return url("/request/$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\RequestType::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function updates(){
        return $this->hasMany(RequestUpdate::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'reference');
    }

    public function polls(){
        return $this->morphMany(Poll::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}