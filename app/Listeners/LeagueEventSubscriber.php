<?php

namespace App\Listeners;

class LeagueEventSubscriber
{
    public function onGameFinish(GameFinish $event) {}

    public function onNewRankings(NewRankings $event) {}

    public function onNewAlert(NewAlert $event) {}

    public function onDraftGenerated(DraftGenerated $event) {}

    public function onDraftStart(DraftStart $event) {}

    public function onDraftEnd(DraftEnd $event) {}

    public function onNewEvent(NewEvent $event) {}

    public function onRemovedEvent(RemovedEvent $event) {}

    public function onEditedEvent(EditedEvent $event) {}

    public function onNewIRPlayer(NewIRPlayer $event) {}

    public function onRemovedIRPlayer(RemovedIRPlayer $event) {}

    public function onSettingsUpdated(SettingsUpdated $event) {}

    public function onRulesChanged(RulesChanged $event) {}

    public function onScheduleUpdated(ScheduleUpdated $event) {}

    public function onNewMessage(NewMessage $event) {}

    public function onNewRequest(NewRequest $event) {}

    public function onNewSeason(NewSeason $event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\League\GameFinish',
            'App\Listeners\LeagueEventSubscriber@onGameFinish'
        );
        $events->listen(
            'App\Events\League\NewRankings',
            'App\Listeners\LeagueEventSubscriber@onNewRankings'
        );
        $events->listen(
            'App\Events\League\NewAlert',
            'App\Listeners\LeagueEventSubscriber@onNewAlert'
        );
        $events->listen(
            'App\Events\League\DraftGenerated',
            'App\Listeners\LeagueEventSubscriber@onDraftGenerated'
        );
        $events->listen(
            'App\Events\League\DraftStart',
            'App\Listeners\LeagueEventSubscriber@onDraftStart'
        );
        $events->listen(
            'App\Events\League\DraftEnd',
            'App\Listeners\LeagueEventSubscriber@onDraftEnd'
        );
        $events->listen(
            'App\Events\League\NewEvent',
            'App\Listeners\LeagueEventSubscriber@onNewEvent'
        );
        $events->listen(
            'App\Events\League\RemovedEvent',
            'App\Listeners\LeagueEventSubscriber@onRemovedEvent'
        );
        $events->listen(
            'App\Events\League\EditedEvent',
            'App\Listeners\LeagueEventSubscriber@onEditedEvent'
        );
        $events->listen(
            'App\Events\League\NewIRPlayer',
            'App\Listeners\LeagueEventSubscriber@onNewIRPlayer'
        );
        $events->listen(
            'App\Events\League\RemovedIRPlayer',
            'App\Listeners\LeagueEventSubscriber@onRemovedIRPlayer'
        );
        $events->listen(
            'App\Events\League\SettingsUpdated',
            'App\Listeners\LeagueEventSubscriber@onSettingsUpdated'
        );
        $events->listen(
            'App\Events\League\RulesChanged',
            'App\Listeners\LeagueEventSubscriber@onRulesChanged'
        );
        $events->listen(
            'App\Events\League\ScheduleUpdated',
            'App\Listeners\LeagueEventSubscriber@onScheduleUpdated'
        );
        $events->listen(
            'App\Events\League\NewMessage',
            'App\Listeners\LeagueEventSubscriber@onNewMessage'
        );
        $events->listen(
            'App\Events\League\NewRequest',
            'App\Listeners\LeagueEventSubscriber@onNewRequest'
        );
        $events->listen(
            'App\Events\League\NewSeason',
            'App\Listeners\LeagueEventSubscriber@onNewSeason'
        );
    }

}