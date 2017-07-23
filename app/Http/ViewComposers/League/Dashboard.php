<?php

namespace App\Http\ViewComposers\League;

use Illuminate\View\View;

use App\Models\Message;
use App\Models\Trade;
use App\Models\Poll;
use App\Models\Week;
use App\Models\WeekStanding;
use App\Models\Activity;
use App\User;

use App\Helpers\DataObject;

class Dashboard
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
        $view->with('week', $this->week);
        $view->with('messages', $this->messages);
        $view->with('trades', $this->trades);
        $view->with('rankings', $this->rankings);
        $view->with('poll', $this->poll);
        $view->with('activity', $this->activity);
    }

    private function init(){
        $this->week = $this->getWeek();
        $this->messages = $this->getMessages();
        $this->trades = $this->getTrades();
        $this->rankings = $this->getRankings();
        $this->poll = $this->getPoll();
        $this->activity = $this->getActivity();
    }

    private function getWeek(){
        $week = collect();
        $week->standings = null;
        $week->events = null;
        return $week;
    }

    private function getMessages(){
        $messages = collect();
        $messages->newsletter = Message::where('type_id', 2)->orderBy('updated_at', 'DESC')->first();
        $messages->admin = Message::where('type_id', 1)->orderBy('updated_at', 'DESC')->limit(4)->get();
        $messages->league = Message::where('type_id', 3)->orderBy('updated_at', 'DESC')->limit(4)->get();
        return $messages;
    }

    private function getTrades(){
        $trades = collect();
        $trades->visible = null;
        return $trades;
    }

    private function getRankings(){
        $rankings = DataObject::WeekRankings();
        return $rankings;
    }

    private function getPoll(){
        return \App\Models\Poll::orderBy('created_at', 'DESC')->first();
    }

    private function getActivity(){
        $activity = collect();
        $activity->recent = null;
        return $activity;
    }
}