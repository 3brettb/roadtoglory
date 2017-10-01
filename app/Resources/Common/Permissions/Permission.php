<?php

namespace App\Resources\Common\Permissions;

class Permission 
{

    public $name;

    public $title;

    public $description;

    public $value;

    public $bit;

    public function __construct()
    {

    }

    public static function fromConfig($xmlObject)
    {
        $perm = new Permission();
        $perm->name = strtoupper("$xmlObject->name");
        $perm->title = "$xmlObject->title";
        $perm->description = "$xmlObject->description";
        $perm->value = (strtolower("$xmlObject->default") == 'true');
        $perm->bit = (int)"$xmlObject->bit";
        return $perm;
    }

}