<?php

namespace App\Listeners;

class UserNotificationSubscriber
{
    public function onGameFinish(GameFinish $event) {}

    public function onNewRankings(NewRankings $event) {}

    public function onNewComment(NewComment $event) {}

    public function onDraftStart(DraftStart $event) {}

    public function onDraftEnd(DraftStart $event) {}

    public function onNewEvent(NewEvent $event) {}

    public function onRemovedEvent(RemovedEvent $event) {}

    public function onEditedEvent(EditedEvent $event) {}

    public function onNewIRPlayer(NewIRPlayer $event) {}

    public function onRemovedIRPlayer(RemovedIRPlayer $event) {}

    public function onSettingsUpdated(SettingsUpdated $event) {}

    public function onRulesChanged(RulesChanged $event) {}

    public function onScheduleChanged(ScheduleChanged $event) {}

    public function onPermissionsChanged(PermissionsChanged $event) {}

    public function onPollResponse(PollResponse $event) {}

    public function onUpdatedRequest(UpdatedRequest $event) {}

    public function onNewTrade(NewTrade $event) {}

    public function onRejectedTrade(RejectedTrade $event) {}

    public function onAcceptedTrade(AcceptedTrade $event) {}

    public function onApprovedTrade(ApprovedTrade $event) {}

    public function onVetoedTrade(VetoedTrade $event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\League\GameFinish',
            'App\Listeners\UserNotificationSubscriber@onGameFinish'
        );
        $events->listen(
            'App\Events\League\NewRankings',
            'App\Listeners\UserNotificationSubscriber@onNewRankings'
        );
        $events->listen(
            'App\Events\User\NewComment',
            'App\Listeners\UserNotificationSubscriber@onNewComment'
        );
        $events->listen(
            'App\Events\League\NewAlert',
            'App\Listeners\UserNotificationSubscriber@onNewAlert'
        );
        $events->listen(
            'App\Events\League\DraftStart',
            'App\Listeners\UserNotificationSubscriber@onDraftStart'
        );
        $events->listen(
            'App\Events\League\DraftEnd',
            'App\Listeners\UserNotificationSubscriber@onDraftEnd'
        );
        $events->listen(
            'App\Events\League\NewEvent',
            'App\Listeners\UserNotificationSubscriber@onNewEvent'
        );
        $events->listen(
            'App\Events\League\RemovedEvent',
            'App\Listeners\UserNotificationSubscriber@onRemovedEvent'
        );
        $events->listen(
            'App\Events\League\EditedEvent',
            'App\Listeners\UserNotificationSubscriber@onEditedEvent'
        );
        $events->listen(
            'App\Events\League\NewIRPlayer',
            'App\Listeners\UserNotificationSubscriber@onNewIRPlayer'
        );
        $events->listen(
            'App\Events\League\RemovedIRPlayer',
            'App\Listeners\UserNotificationSubscriber@onRemovedIRPlayer'
        );
        $events->listen(
            'App\Events\League\SettingsUpdated',
            'App\Listeners\UserNotificationSubscriber@onSettingsUpdated'
        );
        $events->listen(
            'App\Events\League\RulesChanged',
            'App\Listeners\UserNotificationSubscriber@onRulesChanged'
        );
        $events->listen(
            'App\Events\League\ScheduleUpdated',
            'App\Listeners\UserNotificationSubscriber@onScheduleUpdated'
        );
        $events->listen(
            'App\Events\User\PermissionChanged',
            'App\Listeners\UserNotificationSubscriber@onPermissionChanged'
        );
        $events->listen(
            'App\Events\User\PollRespond',
            'App\Listeners\UserNotificationSubscriber@onPollResponse'
        );
        $events->listen(
            'App\Events\User\UpdatedRequest',
            'App\Listeners\UserNotificationSubscriber@onUpdatedRequest'
        );
        $events->listen(
            'App\Events\Trade\Issued',
            'App\Listeners\UserNotificationSubscriber@onNewTrade'
        );
        $events->listen(
            'App\Events\Trade\Rejected',
            'App\Listeners\UserNotificationSubscriber@onRejectedTrade'
        );
        $events->listen(
            'App\Events\Trade\Accepted',
            'App\Listeners\UserNotificationSubscriber@onAcceptedTrade'
        );
        $events->listen(
            'App\Events\Trade\Approved',
            'App\Listeners\UserNotificationSubscriber@onApprovedTrade'
        );
        $events->listen(
            'App\Events\Trade\Vetoed',
            'App\Listeners\UserNotificationSubscriber@onVetoedTrade'
        );
    }
}