<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        include_once('ComposerDependancies\Global.php');
        //---------------------------------------------
        include_once('ComposerDependancies\League.php');
        include_once('ComposerDependancies\Team.php');
        include_once('ComposerDependancies\Matchup.php');
        include_once('ComposerDependancies\Player.php');
        include_once('ComposerDependancies\Trade.php');
        include_once('ComposerDependancies\Draft.php');
        include_once('ComposerDependancies\Message.php');
        include_once('ComposerDependancies\Poll.php');
        include_once('ComposerDependancies\Chat.php');
        include_once('ComposerDependancies\Rule.php');

        
        include_once('ComposerDependancies\Admin\Users.php');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}