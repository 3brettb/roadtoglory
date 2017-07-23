<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.team.show'],
        'App\Http\ViewComposers\Team\Show'
    );