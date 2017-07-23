<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.message.index'],
        'App\Http\ViewComposers\Message\Index'
    );