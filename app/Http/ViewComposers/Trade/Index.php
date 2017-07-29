<?php

namespace App\Http\ViewComposers\Trade;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Trade;

class Index
{

    private $model;

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
        $view->with('model', $this->model());
    }

    private function model()
    {
        $trades = new \stdClass;
        $trades->active = $this->getActiveTrades();
        $trades->accepted = $this->getAcceptedTrades();
        $trades->rejected = $this->getRejectedTrades();
        $trades->league = $this->getLeagueTrades();
        $this->model->trades = $trades;
        return $this->model;
    }

    private function getLeagueTrades()
    {
        $trades = league()->trades()->where('accepted', true)->paginate(10);
        return $trades;
    }

    private function getActiveTrades()
    {
        $trades = team()->trades()->whereNull('accepted')->whereNull('approved')->get();
        foreach($trades as $key => $trade)
        {
            if($trade->accepted == 0)
            {
                $trades->splice($key, 1);
            }
        }
        return $trades;
    }

    private function getAcceptedTrades()
    {
        $trades = team()->trades()->where('accepted', 1)->get();
        return $trades;
    }

    private function getRejectedTrades()
    {
        $trades = team()->trades()->where('accepted', 0)->get();
        return $trades;
    }

}