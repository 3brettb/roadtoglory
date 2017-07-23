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