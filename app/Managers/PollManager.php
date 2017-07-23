<?php

namespace App\Managers;

use Illuminate\Http\Request;

class PollManager extends Manager
{
    static function store(Request $request){

    }

    static function update($id, Request $request){

    }

    static function destroy($id){

    }

    static function find($id){

    }

    static function all(){
        
    }

    static function result($poll){
        $poll->load('questions', 'questions.responses');
        $results = array();
        $winner = 0;
        $winners = array();
        foreach($poll->questions as $question){
            $results[$question->id] = new \stdClass();
            $results[$question->id]->number = count($question->responses);
            $results[$question->id]->question = $question;
            if($winners == array() || count($question->responses) == $winner){
                array_push($winners, $question);
            }
            elseif(count($question->responses) > $winner){
                $winner = count($question->responses);
                $winners = array($question);
            }
        }
        $temp = new \stdClass();
        $temp->final = new \stdClass();
        $temp->final->count = $winner;
        $temp->final->winners = $winners;
        $temp->tie = (count($temp->final->winners) > 1);
        $temp->responses = ($winner > 0);
        $temp->all = $results;
        $temp->open = ($poll->open());
        return $temp;
    }
}