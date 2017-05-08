<?php

    use \App\ResourceModels\Players\Player;
    use \App\ResourceModels\Players\Note;

    use Illuminate\Database\Eloquent\ModelNotFoundException;

    function player_exists($data){
        try{
            $player = Player::where('esbid', $data->esbid)->firstOrFail();
        } catch (ModelNotFoundException $e){
            try{
                $player = Player::where('gsisPlayerId', $data->gsisPlayerId)->firstOrFail();
            } catch (ModelNotFoundException $e){
                $player = Player::where('firstName', $data->firstName)
                    ->where('lastName', $data->lastName)
                    ->where('position', $data->position)->first();
            }
        }
        if($player){
            $player->update(['teamAbbr' => $data->teamAbbr]);
            return $player;
        }
        else{
            return null;
        }
    }

    function note_exists($data){
        return Note::where('timestamp', $data->timestamp)
            ->where('source', $data->source)
            ->where('headline', $data->headline)
            ->where('body', $data->body)
            ->where('analysis', $data->analysis)
            ->exists();
    }