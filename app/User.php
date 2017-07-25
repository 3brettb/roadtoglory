<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'password', 'status', 'team_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot(){
        static::creating(function($model){
            $model->status = "Offline";
        });
    }

    public function routeto(){
        return url("/user/$this->id");
    }

    public function display($format){
        return \App\Managers\UserManager::display($this, $format);
    }

    public function image(){
         //return ($this->image) ? \URL::asset($image->link) : \URL::asset("/img/users/default_user.jpg");
         return \URL::asset("/img/users/default_user.jpg");
    }

    public function getSelectNameAttribute(){
        return $this->firstname." ".$this->lastname;
    }

    public function teams(){
        return $this->hasMany(\App\Models\Team::class);
    }

    public function team(){
        return $this->hasOne(\App\Models\Team::class, 'id', 'team_id');
    }

    public function league(){
        return $this->team->league;
    }

    public function leagues(){
        return $this->hasMany(\App\Models\League::class);
    }

    public function authored(){
        return $this->hasMany(\App\Models\Message::class);
    }

    public function messages(){
        return $this->belongsToMany(\App\Models\Message::class, 'message_recipients', 'user_id', 'message_id');
    }

    public function chats(){
        return $this->belongsToMany(\App\Models\Chat::class, 'chat_users', 'user_id', 'chat_id');
    }

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function user_trades(){
        return $this->hasManyThrough(\App\Models\Trade::class, \App\Models\Team::class, 'user_id', 'team_id', 'id');
    }

    public function user_polls(){
        return $this->hasMany(\App\Models\Poll::class);
    }

    public function poll_responses(){
        return $this->hasMany(\App\Models\PollResponse::class);
    }

    public function user_activity(){
        return $this->hasMany(\App\Models\Activity::class);
    }

    public function requests(){
        return $this->hasMany(\App\Models\Request::class);
    }

    public function request_updates(){
        return $this->hasMany(\App\Models\RequestUpdate::class);
    }

    public function permissions(){
        return $this->hasOne(\App\Models\Permission::class);
    }

    public function activity(){
        return $this->morphToMany(\App\Models\Activity::class, 'activityable');
    }

}