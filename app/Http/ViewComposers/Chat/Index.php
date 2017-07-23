<?php

namespace App\Http\ViewComposers\Chat;

use Illuminate\View\View;

use App\Models\Chat;

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
        $view->with('chat', $this->chat);
        $view->with('chatselect', $this->chatselect);
    }

    private function init(){
        $this->chat = $this->getChat();
        $this->chatselect = $this->getChatSelect();
    }

    private function getChat(){
        $chat = (request()->chat != null) ? Chat::find(request()->chat) : league()->chat();
        $chat->load('comments', 'comments.user');
        return $chat;
    }

    private function getChatSelect(){
        $leaguechat = league()->chat();
        $list = array($leaguechat->id => $leaguechat->name);
        $list += user()->chats()->where('type_id', '!=', 1)->pluck('chats.name', 'chats.id')->toArray();
        return $list;
    }
}