<?php

namespace App\Events\League;

use App\Models\Rule;
use Illuminate\Queue\SerializesModels;

class RulesChanged
{
    use SerializesModels;

    public $rules;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct($array)
    {
        $this->rules = $array;
    }
}