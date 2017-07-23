<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EventType extends Model
{
    protected $table = 'event_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }

}
