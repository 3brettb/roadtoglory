<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.league.dashboard'],
        'App\Http\ViewComposers\League\Dashboard'
    );
    View::composer(
        ['dir.league.standings'],
        'App\Http\ViewComposers\League\Standings'
    );
    View::composer(
        ['dir.league.rankings'],
        'App\Http\ViewComposers\League\Rankings'
    );