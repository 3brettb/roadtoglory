<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.player.index'],
        'App\Http\ViewComposers\Player\Index'
    );