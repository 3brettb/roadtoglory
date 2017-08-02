<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Points extends Model
{

    public $for;

    public $against;

    public function __construct($for=null,$against=null)
    {
        $this->for = $for;
        $this->against = $against;
    }

    public function setFor($val)
    {
        $this->for = $val;
    }

    public function setAgainst($val)
    {
        $this->against = $val;
    }

    public function addFor($val)
    {
        if($this->for == null) $this->for = $val;
        else $this->for += $val;
    }

    public function addAgainst($val)
    {
        if($this->against == null) $this->against = $val;
        else $this->against += $val;
    }

}