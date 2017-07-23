<?php

namespace App\Listeners;

class TradeEventSubscriber
{
    public function onIssued(Issued $event) {}

    public function onAccepted(Accepted $event) {}

    public function onApproved(Approved $event) {}

    public function onRejected(Rejected $event) {}

    public function onVetoed(Rejected $event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Trade\Issued',
            'App\Listeners\TradeEventSubscriber@onIssued'
        );
        $events->listen(
            'App\Events\Trade\Accepted',
            'App\Listeners\TradeEventSubscriber@onAccepted'
        );
        $events->listen(
            'App\Events\Trade\Approved',
            'App\Listeners\TradeEventSubscriber@onApproved'
        );
        $events->listen(
            'App\Events\Trade\Rejected',
            'App\Listeners\TradeEventSubscriber@onRejected'
        );
        $events->listen(
            'App\Events\Trade\Vetoed',
            'App\Listeners\TradeEventSubscriber@onVetoed'
        );
    }
}