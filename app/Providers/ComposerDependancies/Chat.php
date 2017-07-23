<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.chat.index'],
        'App\Http\ViewComposers\Chat\Index'
    );