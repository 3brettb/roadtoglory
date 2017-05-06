<?php

namespace App\ResourceModels\Players;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Stat extends Model
{
    public $timestamps = false;

    protected $connection = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hash', 'category_id', 'value'
    ];

    public static function findByHash($value){
        return Stat::where('hash', $value)->first();
    }

}
