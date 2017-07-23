<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Helpers\Models\LeagueHelper;

class MessageManager extends Manager
{
    static function store(Request $request){
        $commentable = ($request->has('commentable')) ? $commentable : ($request->type != 4) ? true : false;
        user()->authored()->create([
            'subject' => $request->subject,
            'content' => $request->content,
            'commentable' => $commentable,
            'message_id' => $request->reply,
            'type_id' => $request->type,
            'league_id' => league()->id
        ]);
    }

    static function update($id, Request $request){

    }

    static function destroy($id){
        MessageRepository::destroy($id);
    }

    static function find($id){
        return MessageRepository::find($id);
    }

    static function all(){
        return array_merge(league(), admin(), news());
    }

    static function inbox(){
        return MessageRepository::email_messages()->where('league_id', LeagueHelper::active()->id)->get();
    }

    static function league(){
        return MessageRepository::league_messages()->where('league_id', LeagueHelper::active()->id)->get();
    }

    static function admin(){
        return MessageRepository::admin_messages()->where('league_id', LeagueHelper::active()->id)->get();
    }

    static function news(){
        return MessageRepository::news_messages()->where('league_id', LeagueHelper::active()->id)->get();
    }
}