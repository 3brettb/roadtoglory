<?php

    function get_settings(){
        $settings = league()->settings;
        return $settings->mapWithKeys(function($item){
            return [$item['name'] => $item];
        });
    }

    function current_nfl_week(){
        return 1;
    }

    function current_week(){
        return 1;
    }

    function get_slot_player($team, $slot, $type){
        switch($type){
            case "STARTER":
                return $team->roster()->where('starter', 1)->where('slot', $slot)->first();
            case "IR":
                return $team->roster()->where('starter', 0)->where('slot', (-1)*(int)$slot)->first();
            case "BENCH":
            default:
                return $team->roster()->where('starter', 0)->where('slot', $slot)->first();
        }
    }

    function get_starter_slots(){
        $settings = get_settings();
        return array(
            "QB" => ['num' => (int)$settings['ROSTER_START_QB']->value, 'accept' => $settings['ROSTER_START_QB']->data()->positions],
            "RB" => ['num' => (int)$settings['ROSTER_START_RB']->value, 'accept' => $settings['ROSTER_START_RB']->data()->positions],
            "WR" => ['num' => (int)$settings['ROSTER_START_WR']->value, 'accept' => $settings['ROSTER_START_WR']->data()->positions],
            "TE" => ['num' => (int)$settings['ROSTER_START_TE']->value, 'accept' => $settings['ROSTER_START_TE']->data()->positions],
            "FLEX" => ['num' => (int)$settings['ROSTER_START_FLEX']->value, 'accept' => $settings['ROSTER_START_FLEX']->data()->positions],
            "RB/WR" => ['num' => (int)$settings['ROSTER_START_RBWR']->value, 'accept' => $settings['ROSTER_START_RBWR']->data()->positions],
            "WR/TE" => ['num' => (int)$settings['ROSTER_START_WRTE']->value, 'accept' => $settings['ROSTER_START_WRTE']->data()->positions],
            "K" => ['num' => (int)$settings['ROSTER_START_K']->value, 'accept' => $settings['ROSTER_START_K']->data()->positions],
            "DEF" => ['num' => (int)$settings['ROSTER_START_DEF']->value, 'accept' => $settings['ROSTER_START_DEF']->data()->positions],
        );
    }