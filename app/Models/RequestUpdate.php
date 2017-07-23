<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestUpdate extends Model
{
    protected $table = 'request_updates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id', 'user_id', 'subject', 'description',
    ];

    public function routeto(){
        return $this->user_request->routeto();
    }

    public function user_request(){
        return $this->belongsTo(\App\Model\Request::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
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