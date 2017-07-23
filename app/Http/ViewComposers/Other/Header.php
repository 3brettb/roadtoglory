<?php

namespace App\Http\ViewComposers\Other;

use Illuminate\View\View;

class Header
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('messages', $this->messages);
        $view->with('alerts', $this->alerts);
        $view->with('notifications', $this->notifications);
        $view->with('profile', $this->profile);
    }

    private function init(){
        $this->messages = $this->getMessages();
        $this->alerts = $this->getAlerts();
        $this->notifications = $this->getNotifications();
        $this->profile = $this->getProfile();
    }

    private function getMessages(){
        return null;
    }

    private function getAlerts(){
        return null;
    }

    private function getNotifications(){
        return null;
    }

    private function getProfile(){
        return null;
    }
}