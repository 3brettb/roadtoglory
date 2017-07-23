<?php

namespace App\Models\Resource\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class Cron extends Model
{
    protected $connection = 'system';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'script', 'info'
    ];

    public static function boot(){
        static::creating(function($model){
            $model->id = (string)Uuid::uuid4();
        });
    }

}
