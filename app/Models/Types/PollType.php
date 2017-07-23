<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PollType extends Model
{
    protected $table = 'poll_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function polls(){
        return $this->hasMany(\App\Models\Poll::class);
    }

}