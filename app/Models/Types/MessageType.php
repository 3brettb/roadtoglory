<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MessageType extends Model
{
    protected $table = 'message_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function messages(){
        return $this->hasMany(\App\Models\Message::class);
    }

}
