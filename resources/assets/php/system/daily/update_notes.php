#! usr/bin/php
<?php

    use \App\ResourceModels\Players\Setting;
    use \App\ResourceModels\Players\Player;
    use \App\ResourceModels\Players\Note;
    use \Carbon\Carbon;

    use Illuminate\Database\Eloquent\ModelNotFoundException;

    $start = 0;
    $limit = 100;
    $stop = false;

    // Add notes until duplicate note and stop
    while(!$stop){
        $data = getData($start, $limit);

        foreach($data->news as $item){
            if($player = playerExists($item)){
                if(!noteExists($item)){
                    $player->notes()->create([
                        'timestamp' => $item->timestamp,
                        'source' => $item->source,
                        'headline' => $item->headline,
                        'body' => $item->body,
                        'analysis' => $item->analysis
                    ]);
                }
                else{
                    $stop = true;
                    break;
                }
            }
        }
    }

    function getData($start, $limit){
        return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/news?format=json&offset=$start&count=$limit"));
    }

    function noteExists($data){
        return Note::where('timestamp', $data->timestamp)
            ->where('source', $data->source)
            ->where('headline', $data->headline)
            ->where('body', $data->body)
            ->where('analysis', $data->analysis)
            ->exists();
    }

    // Return id of player in database or return null
    function playerExists($data){
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