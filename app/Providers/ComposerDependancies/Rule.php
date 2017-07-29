<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.rule.index'],
        'App\Http\ViewComposers\Rule\Index'
    );