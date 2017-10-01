<?php

namespace App\Resources\Math;

class Conversion
{

    static function bitArrayToHex($byte_array)
    {
        $values = array_values($byte_array);
        $binary = implode("", $values);
        return dechex(bindec($binary));
    }

    static function hexToBitArray($hex)
    {
        $binary = decbin(hexdec($hex));
        return str_split($binary);
    }

}