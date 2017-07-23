<?php

namespace App\Http\ViewComposers\Message;

use Illuminate\View\View;

use App\Models\Message;
use App\Models\Types\MessageType;

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
        $view->with('messages', $this->messages);
        $view->with('type_select', $this->type_select);
    }

    private function init(){
        $this->messages = $this->getMessages();
        $this->type_select = $this->getTypeSelect();
    }

    private function getMessages(){
        $pagination_number = 10;
        if(request()->type != null){
            return league()->messages()->where('type_id', request()->type)->paginate($pagination_number);
        }
        else{
            return league()->messages()->paginate($pagination_number);
        }
    }

    private function getTypeSelect(){
        return MessageType::pluck('name', 'id');
    }
}