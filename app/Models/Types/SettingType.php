<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SettingType extends Model
{
    protected $table = 'setting_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function settings(){
        return $this->hasMany(\App\Models\Setting::class);
    }

}