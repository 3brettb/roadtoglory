<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PollQuestion extends Model
{
    protected $table = 'poll_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'poll_id', 'description',
    ];

    public function routeto(){
        return $this->poll->routeto();
    }

    public function poll(){
        return $this->belongsTo(Poll::class);
    }

    public function response_users(){
        return $this->hasManyThrough(\App\User::class, PollResponse::class, 'poll_question_id', 'user_id', 'id');
    }

    public function responses(){
        return $this->hasMany(PollResponse::class);
    }

}