<?php

namespace App\Events\League;

use App\Models\Setting;
use Illuminate\Queue\SerializesModels;

class SettingsUpdated
{
    use SerializesModels;

    public $settings;

    /**
     * Create a new event instance.
     *
     * @param  Order  $order
     * @return void
     */
    public function __construct($array)
    {
        $this->settings = $array;
    }
}