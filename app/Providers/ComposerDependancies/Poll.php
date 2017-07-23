<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.poll.index'],
        'App\Http\ViewComposers\Poll\Index'
    );