<?php
    //Get list of players for given season
    //Use player rankings to parse through active players for that year.

    use \App\ResourceModels\Players\Setting;
    use \App\ResourceModels\Players\Season;
    use \App\ResourceModels\Players\Player;

    set_time_limit(1000);

    $start = 0;
    $limit = 2000;

    getPlayers($limit, $start);

    function getPlayers($limit, $start){
        $data = json_decode(playerdata($limit, $start));
        //dd($data);
        while(count($data->players) >= $limit){
            addplayers($data);
            $data = json_decode(playerdata($limit, $start+$limit));
        }
        addplayers($data);
    }

    function playerdata($limit, $start){
        return file_get_contents(Setting::get('NFL_API_URI')."/players/researchinfo?format=json&count=$limit&offset=$start&season=".Season::find(Setting::get("ACTIVE_SEASON_ID"))->name);
    }

    function addplayers($data){
        foreach($data->players as $player){
            if(!in_array($player->position, ['DL','LB','DB'])){
                $p = (count(Player::find($player->id)) > 0) ? Player::find($player->id) : new Player();
                $p->id = $player->id;
                $p->esbid = $player->esbid;
                $p->gsisPlayerId = $player->gsisPlayerId;
                $p->firstname = $player->firstName;
                $p->lastname = $player->lastName;
                $p->teamAbbr = $player->teamAbbr;
                $p->position = $player->position;
                $p->save();
            }
        }
    }

    $completed = true;

?>