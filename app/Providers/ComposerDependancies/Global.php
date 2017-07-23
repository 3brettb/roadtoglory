<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['layout.header'],
        'App\Http\ViewComposers\Other\Header'
    );