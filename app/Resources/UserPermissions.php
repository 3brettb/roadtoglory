<?php

namespace App\Resources;

use App\Models\Permission;
use App\User;

class UserPermissions
{

    private $permissions = null;

    private $user = null;

    private static $defaults = [
        'ADMIN' => 0,
        'LEAGUE_MESSAGE_WRITE' => 1,
        'LEAGUE_MESSAGE_COMMENT' => 1,
        'ADMIN_MESSAGE_WRITE' => 0,
        'ADMIN_MESSAGE_COMMENT' => 1,
        'NEWSLETTER_WRITE' => 0,
        'NEWSLETTER_COMMENT' => 0,
        'RANKINGS_CREATE' => 0,
        'POLL_CREATE' => 1,
        'POLL_RESPOND' => 1,
        'POLL_COMMENT' => 1,
        'LEAGUE_CHAT_COMMENT' => 1,
        'TRADE' => 1,
        'EVENT_CREATE' => 1,
        'EVENT_COMMENT' => 1,
        'REQUEST_WRITE' => 1,
    ];

    public function __construct(Permission $permission)
    {
        $this->permissions = self::parseSet($permission);
        $this->user = $permission->user;
        $this->parse();
    }

    public function toValue()
    {
        return strtoupper($this->parseGet($this->permissions));
    }

    public function can($verb)
    {
        return $this->permissions[$verb] == 1;
    }

    public function cant($verb)
    {
        return !$this->can($verb);
    }

    public function set($key, $value)
    {
        if(isset($this->permissions[strtoupper($key)])){
            $this->permissions[strtoupper($key)] = $value;
            $this->{$key} = $value; 
        }
    }

    public function setArray($array)
    {
        foreach($array as $key => $value)
        {
            $this->set($key, $value);
        }
    }

    public function parse()
    {
        foreach($this->permissions as $permission => $value)
        {
            $this->{strtolower($permission)} = (int)$value;
        }
    }

    private static function parseSet(Permission $permission)
    {
        return self::decompute($permission->value);
    }

    private static function parseGet($permissions)
    {
        return self::compute($permissions);
    }

    private static function compute($array)
    {
        $values = array_values($array);
        $binary = implode("", $values);
        return dechex(bindec($binary));
    }

    private static function decompute($value)
    {
        $binary = decbin(hexdec($value));
        $values = str_split($binary);
        return array_combine(array_keys(self::$defaults), $values);
    }

    static function generate(User $user, $all, $array)
    {
        $permissions = array_merge(self::$defaults, $array);
        $temp = new Permission();
        $temp->user_id = $user->id;
        $temp->value = self::compute($permissions);
        return new UserPermissions($temp);
    }

}