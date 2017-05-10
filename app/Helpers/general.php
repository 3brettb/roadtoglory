<?php

    function user(){
        return auth()->user();
    }

    function team(){
        return auth()->user()->team;
    }

    function league(){
        return auth()->user()->team->league;
    }

    function teams(){
        return auth()->user()->team->league->teams;
    }