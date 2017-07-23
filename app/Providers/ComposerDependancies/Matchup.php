<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.matchup.index'],
        'App\Http\ViewComposers\Matchup\Index'
    );