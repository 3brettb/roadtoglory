<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class MessageRecipient extends Pivot
{
    use SoftDeletes;
    
    protected $table = 'message_recipients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message_id', 'user_id', 'isread', 'starred',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'isread' => 'boolean',
        'starred' => 'boolean',
    ];

    public function routeto(){
        return $this->message->routeto();
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
