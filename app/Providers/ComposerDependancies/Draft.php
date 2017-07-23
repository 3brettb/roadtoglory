<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.draft.index'],
        'App\Http\ViewComposers\Draft\Index'
    );