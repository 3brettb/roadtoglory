<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestType extends Model
{
    protected $table = 'request_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function requests(){
        return $this->hasMany(\App\Models\Request::class);
    }

}
