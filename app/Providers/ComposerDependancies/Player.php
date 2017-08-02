<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.player.index'],
        'App\Http\ViewComposers\Player\Index'
    );

    View::composer(
        ['dir.player.move'],
        'App\Http\ViewComposers\Player\Move'
    );