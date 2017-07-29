<?php

namespace App\Http\ViewComposers\Trade;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Trade;

class Show
{
    private $model;

    private $trade;

    private $queries = array();

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new \stdClass();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->trade = $view->trade;
        $this->loadQueries();
        $view->with('model', $this->model());
    }

    private function model(){
        $this->model->hasResponse = $this->hasResponse();
        $this->model->isOwner = $this->isOwner();
        $this->model->isRecipient = $this->isRecipient();
        $this->model->response = $this->getResponse();
        return $this->model;
    }

    private function isOwner(){
        return ($this->trade->owner == team());
    }

    private function isRecipient(){
        return ($this->queries['recipient']->count() > 0);
    }

    private function hasResponse(){
        return ($this->trade->teams()->where('tradeable_id', team()->id)->where('accept', '!=', null)->count() > 0);
    }

    private function getResponse(){
        if($this->model->hasResponse){
            $value = $this->queries['recipient']->first()->pivot->accept;
            switch($value){
                case 0:
                case false:
                    return "Rejected";
                case 1:
                case true:
                    return "Accepted";
            }
        }
        return null;
    }

    private function loadQueries(){
        $this->queries['recipient'] = $this->trade->teams()->where('tradeable_id', team()->id);
    }

}