<?php

namespace App\Http\ViewComposers\Trade;

use Illuminate\View\View;
use App\Helpers\DataObject;

use App\Models\Trade;

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
        $view->with('trades', $this->trades);
        $view->with('mytrades', $this->mytrades);
    }

    private function init(){
        $this->trades = $this->getTrades();
        $this->mytrades = $this->getMyTrades();
    }

    private function getTrades(){
        $trades = league()->trades()->where('accepted', true)->paginate(10);
        return $trades;
    }

    private function getMyTrades(){
        // Get only trades where active user is associated.
        $trades = null;
        return $trades;
    }

}