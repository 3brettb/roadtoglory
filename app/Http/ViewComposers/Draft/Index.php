<?php

namespace App\Http\ViewComposers\Draft;

use Illuminate\View\View;

use App\Models\Draft;

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
        $view->with('draft', $this->draft);
    }

    private function init(){
        $this->draft = $this->getDraft();
    }

    private function getDraft(){
        $draft = Draft::find(1);
        return $draft;
    }
}