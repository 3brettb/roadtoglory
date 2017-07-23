<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Managers\PollManager;

class Poll extends Model
{
    protected $table = 'polls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'league_id', 'subject', 'description', 'closes', 'multi', 'hiddenuser', 'commentable', 'type_id',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'closes' => 'datetime',
        'multi' => 'boolean',
        'hiddenuser' => 'boolean',
        'commentable' => 'boolean',
    ];

    public function routeto(){
        return url("/poll/$this->id");
    }

    public function results(){
        return PollManager::result($this);
    }

    public function open(){
        return ($this->closes > \Carbon\Carbon::now());
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\PollType::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'reference');
    }

    public function questions(){
        return $this->hasMany(PollQuestion::class);
    }

    public function responses(){
        return $this->hasManyThrough(PollResponse::class, PollQuestion::class, 'poll_id', 'poll_question_id', 'id');
    }

    public function reference(){
        return $this->morphTo();
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}