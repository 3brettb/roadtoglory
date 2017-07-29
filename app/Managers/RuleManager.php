<?php

namespace App\Managers;

use Illuminate\Http\Request;

use App\Models\Rule;

class RuleManager extends Manager
{
    static function store(Request $request)
    {

    }

    static function update($id, Request $request)
    {

    }

    static function destroy($id)
    {

    }

    static function find($id)
    {

    }

    static function all()
    {
        
    }

    static function toString(Rule $rule)
    {
        switch($rule->type_id)
        {
            case 1:
                return self::sectionToString($rule);
            case 2:
                return self::articleToString($rule);
            case 3:
                return self::clauseToString($rule);
        }
    }

    static function sectionToString(Rule $rule)
    {
        return self::intToRoman($rule->number).". ".$rule->subject." ";
    }

    static function articleToString(Rule $rule)
    {
        return self::intToAlphaNum($rule->number).". ".$rule->subject." ";
    }

    static function clauseToString(Rule $rule)
    {
        return "$rule->number. ";
    }

    static function intToRoman($value)
    {
        $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
        $return = ''; 
        while($value > 0) 
        { 
            foreach($table as $rom=>$arb) 
            { 
                if($value >= $arb) 
                { 
                    $value -= $arb; 
                    $return .= $rom; 
                    break; 
                } 
            } 
        } 
        return $return;
    }

    static function intToAlphaNum($value)
    {
        $base = 26;
        $digits = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $return = array();
        while($value > 0)
        {   
            if($value > 26)
            {
                $mul = (int)floor($value / 26);
                $value = $value % 26;
                array_push($return, $mul);
            } else{
                array_push($return, $value);
                $value = 0;
            }
        }
        foreach($return as $key => $val)
        {
            $return[$key] = $digits[$val-1];
        }
        return implode("", $return);
    }
}