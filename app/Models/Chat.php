<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Chat extends Model
{
    protected $table = 'chats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type_id', 'league_id',
    ];

    public function routeto(){
        return url("/chat/$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\ChatType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function users(){
        return $this->belongsToMany(\App\User::class, 'chat_users', 'chat_id', 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
