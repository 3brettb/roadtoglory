<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*'App\Events\GameFinished' => [
            'App\Listeners\Activity\GameFinish',
            'App\Listeners\Notification\GameFinish',
        ],
        'App\Events\NewRankings' => [
            'App\Listeners\Activity\NewRankings',
            'App\Listeners\Notification\NewRankings',
        ],
        'App\Events\NewAlert' => [
            'App\Listeners\Activity\NewAlert',
        ],
        'App\Events\DraftGenerated' => [
            'App\Listeners\Activity\DraftGenerated',
        ],
        'App\Events\DraftStart' => [
            'App\Listeners\Activity\DraftStart',
            'App\Listeners\Notification\DraftStart',
        ],
        'App\Events\DraftEnd' => [
            'App\Listeners\Activity\DraftEnd',
            'App\Listeners\Notification\DraftEnd',
        ],
        'App\Events\NewEvent' => [
            'App\Listeners\Activity\NewEvent',
            'App\Listeners\Notification\NewEvent',
        ],
        'App\Events\RemovedEvent' => [
            'App\Listeners\Activity\RemovedEvent',
            'App\Listeners\Notification\RemovedEvent',
        ],
        'App\Events\EditedEvent' => [
            'App\Listeners\Activity\EditedEvent',
            'App\Listeners\Notification\EditedEvent',
        ],
        'App\Events\NewIRPlayer' => [
            'App\Listeners\Activity\NewIRPlayer',
            'App\Listeners\Notification\NewIRPlayer',
        ],
        'App\Events\RemovedIRPlayer' => [
            'App\Listeners\Activity\RemovedIRPlayer',
            'App\Listeners\Notification\RemovedIRPlayer',
        ],
        'App\Events\LeagueSettingsUpdated' => [
            'App\Listeners\Activity\LeagueSettingsUpdated',
            'App\Listeners\Notification\LeaugeSettingsUpdated',
        ],
        'App\Events\LeagueRulesChanged' => [
            'App\Listeners\Activity\LeagueRulesChanged',
            'App\Listeners\Notification\LeaugeRulesChanged',
        ],
        'App\Events\LeagueScheduleUpdated' => [
            'App\Listeners\Activity\LeagueScheduleUpdated',
            'App\Listeners\Notification\LeaugeScheduleUpdated',
        ],
        'App\Events\NewMessage' => [
            'App\Listeners\Activity\NewMessage',
        ],
        'App\Events\PollCreated' => [
            'App\Listeners\Activity\PollCreated',
        ],
        'App\Events\PollDeleted' => [
            'App\Listeners\Activity\PollDeleted',
        ],
        'App\Events\PollResults' => [
            'App\Listeners\Activity\PollResults',
        ],
        'App\Events\NewRequest' => [
            'App\Listeners\Activity\NewRequest',
        ],
        'App\Events\RosterPlayerAdded' => [
            'App\Listeners\Activity\RosterPlayerAdded',
        ],
        'App\Events\RosterPlayerDropped' => [
            'App\Listeners\Activity\RosterPlayerDropped',
        ],
        'App\Events\RosterPlayerMoved' => [
            'App\Listeners\Activity\RosterPlayerMoved',
        ],
        'App\Events\PermissionsChanged' => [
            'App\Listeners\Notification\PermissionsChanged',
        ],
        'App\Events\RosterPlayerDropped' => [
            'App\Listeners\Activity\RosterPlayerDropped',
        ],
        'App\Events\RosterPlayerMoved' => [
            'App\Listeners\Activity\RosterPlayerMoved',
        ],*/
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
        'App\Listeners\LeagueEventSubscriber',
        'App\Listeners\RosterEventSubscriber',
        'App\Listeners\TradeEventSubscriber',
        'App\Listeners\UserNotificationSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
