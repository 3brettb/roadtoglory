<?php

namespace App\Http\ViewComposers\Poll;

use Illuminate\View\View;

use App\Models\Poll;

class Index
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
        $view->with('polls', $this->polls);
    }

    private function init(){
        $this->polls = $this->getPolls();
    }

    private function getPolls(){
        $polls = league()->polls;
        $polls->load('responses', 'questions', 'questions.responses');
        foreach($polls as $poll){
            $poll->hasUserResponse = ($poll->responses()->where('user_id', user()->id)->count() > 0);
        }
        return $polls;
    }
}