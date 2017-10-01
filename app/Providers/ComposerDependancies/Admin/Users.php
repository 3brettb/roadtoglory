<?php

    use Illuminate\Support\Facades\View;

    View::composer(
        ['dir.admin.users.permissions'],
        'App\Http\ViewComposers\Admin\Users\Permissions'
    );