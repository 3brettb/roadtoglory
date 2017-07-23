<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WeekType extends Model
{
    protected $table = 'week_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function weeks(){
        return $this->hasMany(\App\Models\Week::class);
    }

}
