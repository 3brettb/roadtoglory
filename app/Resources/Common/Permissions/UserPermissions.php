<?php

namespace App\Resources\Common\Permissions;

use App\Models\Permission as PermissionModel;
use App\User;
use App\Resources\Math\Math;

class UserPermissions
{

    private $league;

    private $user;

    private $default_xml;

    public $default;

    private $permissions;

    private static $config = "\Resources\Configurations\Permissions.xml";

    public function __construct($user = null)
    {
        $this->generate();
        $this->setUser($user);
        if($this->user)
        {
            $this->league = league();
            return $this->retrievePermissions();
        }
        else return $this->noPermissions();    
    }

    public function can($verb)
    {
        $permission = $this->permissions->where('name', strtoupper($verb))->first();
        if($permission)
        {
            return $permission->value;
        }
        return false;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function set($position, $value)
    {
        $permission = $this->permissions->where('bit', $position)->first();
        if($permission)
        {
            $permission->value = $value == 1 || $value == "1";
        }
        $this->savePermissions();
    }

    private function generate()
    {
        $this->retrieveDefault();
        $default = array();
        $permissions = array();
        foreach($this->default_xml as $xml)
        {
            $perm = Permission::fromConfig($xml);
            array_push($default, clone $perm);
            array_push($permissions, clone $perm);
        }
        $this->default = collect($default);
        $this->permissions = collect($permissions);
    }

    private function setUser($user)
    {
        if($user != null)
        {
            $this->user = $user;
        }
        else 
        {
            $this->user = auth()->user();
        }
    }

    private function noPermissions()
    {
        foreach($this->permissions as $permission)
        {
            $permission->value = false;
        }
        return $this;
    }

    private function defaultPermissions()
    {

    }

    private function allPermissions()
    {
        foreach($this->permissions as $permission)
        {
            $permission->value = true;
        }
        return $this;
    }

    private function retrieveDefault()
    {
        $config_file = app_path().self::$config;
        $this->default_xml = simplexml_load_file($config_file);
        return $this;
    }

    private function retrievePermissions()
    {
        $model = $this->user->permissions;
        if($model)
        {
            $this->applyPermissions($model->value);
        }
        else
        {
            $this->createPermissions();
        }
        return $this;
    }

    private function applyPermissions($value)
    {
        $bit_array = Math::hexToBitArray($value);
        $bit_array = array_reverse($bit_array);
        foreach($bit_array as $index => $bit)
        {
            $p = $this->permissions->where('bit', $index)->first();
            if($p)
            {
                $p->value = ($bit == 1);
            }
        }
        return $this;
    }

    private function savePermissions($create = false)
    {
        $bit_array = array_fill(0, sizeof($this->permissions), 0);
        foreach($this->permissions as $permission)
        {
            $bit_array[$permission->bit] = ($permission->value) ? 1 : 0;
        }
        $bit_array = array_reverse($bit_array);
        $hex = Math::bitArrayToHex($bit_array);
        if($create)
        {
            $this->user->permissions()->create([
                'value' => $hex,
                'league_id' => league()->id
            ]);
        }
        else
        {
            $this->user->permissions->update(['value' => $hex]);
        }
        return $this;
    }

    private function createPermissions()
    {
        $this->permissions = clone $this->default;
        $this->savePermissions(true);
    }
}