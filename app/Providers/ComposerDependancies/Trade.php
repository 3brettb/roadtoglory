<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.trade.index'],
        'App\Http\ViewComposers\Trade\Index'
    );
    View::composer(
        ['dir.trade.create'],
        'App\Http\ViewComposers\Trade\Create'
    );
    View::composer(
        ['dir.trade.show'],
        'App\Http\ViewComposers\Trade\Show'
    );