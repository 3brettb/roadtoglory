<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PollResponse extends Model
{
    protected $table = 'poll_responses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'poll_question_id', 'response',
    ];

    public function routeto(){
        return $this->question->routeto();
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function question(){
        return $this->belongsTo(PollQuestion::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}