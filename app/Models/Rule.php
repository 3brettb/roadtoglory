<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rule extends Model
{
    protected $table = 'rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'league_id', 'subject', 'description', 'rule_id', 'type_id',
    ];

    public function routeto(){
        return url("/rules#$this->id");
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\RuleType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function parent(){
        return $this->belongsTo(Rule::class);
    }

    public function children(){
        return $this->hasMany(Rule::class);
    }

    public function activity(){
        return $this->morphToMany(Activity::class, 'activityable');
    }

}