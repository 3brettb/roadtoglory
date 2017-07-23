<?php

namespace App\Models\Types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ChatType extends Model
{
    protected $table = 'chat_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function chats(){
        return $this->hasMany(\App\Models\Chat::class);
    }

}
