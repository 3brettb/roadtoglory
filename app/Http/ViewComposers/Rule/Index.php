<?php

namespace App\Http\ViewComposers\Rule;

use Illuminate\View\View;

use App\Models\Rule;

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
        $rules = new \stdClass();
        $rules->sections = $this->getSections();
        $rules->articles = $this->getArticles();
        $rules->clauses = $this->getClauses();
        $this->model->rules = $rules;
        return $this->model;
    }

    private function getSections()
    {
        return league()->rules()->where('type_id', 1)->orderBy('number', 'ASC')->with('children')->get();
    }

    private function getArticles()
    {
        return league()->rules()->where('type_id', 2)->orderBy('number', 'ASC')->with('children')->get();
    }

    private function getClauses()
    {
        return league()->rules()->where('type_id', 3)->orderBy('number', 'ASC')->get();
    }
}