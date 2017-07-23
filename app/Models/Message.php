<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

use App\Helpers\Models\MessageHelper;

class Message extends Model
{
    use SoftDeletes;
    
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'content', 'user_id', 'commentable', 'message_id', 'type_id', 'league_id',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'commentable' => 'boolean',
    ];

    public function routeto(){
        return url("/message/$this->id");
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function type(){
        return $this->belongsTo(\App\Models\Types\MessageType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function from(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function to(){
        return $this->belongsToMany(\App\User::class, 'message_recipients', 'message_id', 'user_id');
    }

    public function parent(){
        return $this->belongTo(Message::class);
    }

    public function children(){
        return $this->hasMany(Message::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'reference');
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

    public function author(){
        return MessageHelper::author($this);
    }

}