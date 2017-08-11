<?php

    function user(){
        return auth()->user();
    }

    function team(){
        return auth()->user()->team;
    }

    function league(){
        return team()->league;
    }

    function teams(){
        return league()->teams;
    }

    function current_week(){
        return league()->week;
    }

    function season(){
        return current_week()->season;
    }