<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Alert extends Model
{
    protected $table = 'alerts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'active', 'league_id', 'reference_uri',
    ];

    public function routeto(){
        return url("/alert/$this->id");
    }
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}