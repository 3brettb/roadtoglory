<?php

namespace App\Resources\Math;

class Math
{
    
    static function bitArrayToHex($byte_array)
    {
        return Conversion::bitArrayToHex($byte_array);
    }

    static function hexToBitArray($hex)
    {
        return Conversion::hexToBitArray($hex);
    }

}