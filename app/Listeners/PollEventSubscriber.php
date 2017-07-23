<?php

namespace App\Listeners;

class PollEventSubscriber
{
    public function onPollCreated(Created $event) {}

    public function onPollDeleted(Deleted $event) {}

    public function onPollResults(Results $event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Poll\Created',
            'App\Listeners\PollEventSubscriber@onCreated'
        );
        $events->listen(
            'App\Events\Poll\Deleted',
            'App\Listeners\PollEventSubscriber@onDeleted'
        );
        $events->listen(
            'App\Events\Poll\Results',
            'App\Listeners\PollEventSubscriber@onResults'
        );
    }
}