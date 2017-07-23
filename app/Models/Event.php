<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'start', 'end', 'league_id', 'type_id',
    ];

    public function routeto(){
        return url("/event/$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\EventType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
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