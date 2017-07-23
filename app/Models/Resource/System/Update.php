<?php

namespace App\Models\Resource\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Update extends Model
{
    public $timestamps = false;

    protected $connection = 'system';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'script', 'status', 'output', 'work'
    ];

}
