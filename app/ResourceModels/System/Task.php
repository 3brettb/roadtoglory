<?php

namespace App\ResourceModels\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Task extends Model
{
    public $timestamps = false;

    protected $connection = 'system';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'notes', 'data', 'period', 'next'
    ];

}
