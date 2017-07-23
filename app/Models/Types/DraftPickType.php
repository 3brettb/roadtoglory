<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DraftPickType extends Model
{
    protected $table = 'draft_pick_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function draft_picks(){
        return $this->hasMany(\App\Models\DraftPick::class);
    }

}
