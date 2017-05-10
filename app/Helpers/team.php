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

    function get_starter_size(){
        $settings = get_settings();
        $count = (int)$settings['ROSTER_START_QB']->value;
        $count += (int)$settings['ROSTER_START_RB']->value;
        $count += (int)$settings['ROSTER_START_WR']->value;
        $count += (int)$settings['ROSTER_START_TE']->value;
        $count += (int)$settings['ROSTER_START_FLEX']->value;
        $count += (int)$settings['ROSTER_START_RBWR']->value;
        $count += (int)$settings['ROSTER_START_WRTE']->value;
        $count += (int)$settings['ROSTER_START_K']->value;
        $count += (int)$settings['ROSTER_START_DEF']->value;
        return $count;
    }

    function get_bench_size(){
        $settings = get_settings();
        return (int)$settings['ROSTER_MAX_SIZE']->data()->weeks->{current_nfl_week()} - get_starter_size();
    }

    function get_ir_size(){
        $settings = get_settings();
        return (int)$settings['ROSTER_MAX_IR']->value;
    }

    function get_starter_offset(){
        return 1;
    }

    function get_bench_offset(){
        return get_starter_offset() + get_starter_size();
    }

    function get_ir_offset(){
        return get_bench_offset() + get_bench_size();
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

    function get_bench_slots(){
        $settings = get_settings();
        return array(
            "BENCH" => ['num' => get_bench_size(), 'accept' => null],
        );
    }

    function get_ir_slots(){
        $settings = get_settings();
        return array(
            "IR" => ['num' => get_ir_size(), 'accept' => null],
        );
    }