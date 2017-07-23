<?php

namespace App\Models\Resource\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Season extends Model
{
    public $timestamps = false;

    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
