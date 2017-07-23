<?php

namespace App\Listeners;

class RosterEventSubscriber
{
    public function onAdded(Added $event) {}

    public function onMoved(Moved $event) {}

    public function onDropped(Dropped $event) {}

    public function onTraded(Traded $event) {}

    public function onWaiverClaimed(WaiverClaimed $event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Roster\Added',
            'App\Listeners\RosterEventSubscriber@onAdded'
        );
        $events->listen(
            'App\Events\Roster\Moved',
            'App\Listeners\RosterEventSubscriber@onMoved'
        );
        $events->listen(
            'App\Events\Roster\Dropped',
            'App\Listeners\RosterEventSubscriber@onDropped'
        );
        $events->listen(
            'App\Events\Roster\Traded',
            'App\Listeners\RosterEventSubscriber@onTraded'
        );
        $events->listen(
            'App\Events\Roster\WaiverClaimed',
            'App\Listeners\RosterEventSubscriber@onWaiverClaimed'
        );
    }
}