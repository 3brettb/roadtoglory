<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'reference_type', 'reference_id', 'content',
    ];

    public function routeto(){
        return $this->reference->routeto();
    }

    public static function boot(){
        static::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function reference(){
        return $this->morphTo();
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}
