<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Setting extends Model
{
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'type_id', 'name', 'value', 'reference_type', 'reference_id',
    ];

    public function routeto(){
        return url("/settings#$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\SettingType::class);
    }

    public function category(){
        return $this->belongsTo(\App\Models\Types\SettingCategory::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}