<?php

namespace App\Helpers\Models;

use App\Models\Message;

class MessageHelper
{
    static function author($message){
        switch($message->type_id){
            //case 1:
                //return "Administrator";
            case 1:
            case 2:
            case 3:
            case 4:
            default:
                return $message->from->display('{F} {L}');
        }
    }
}