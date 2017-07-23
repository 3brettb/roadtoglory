<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RuleType extends Model
{
    protected $table = 'rule_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function rules(){
        return $this->hasMany(\App\Models\Rule::class);
    }

}