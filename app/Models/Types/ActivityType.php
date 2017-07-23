<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActivityType extends Model
{
    protected $table = 'activity_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function activities(){
        return $this->hasMany(\App\Models\Activity::class);
    }

}
