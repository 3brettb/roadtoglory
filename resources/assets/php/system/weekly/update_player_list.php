<?php
    //Get list of players for given season
    //Use player rankings to parse through active players for that year.

    include_once(app_path().'\Helpers\System\system.php');

    use \App\ResourceModels\Players\Setting;
    use \App\ResourceModels\Players\Season;
    use \App\ResourceModels\Players\Player;

    set_time_limit(2000);

    $start = 0;
    $limit = 2000;
    $count = 0;

    $count = getPlayers($limit, $start, $count);

    function getPlayers($limit, $start, $count){
        $data = json_decode(playerdata($limit, $start));
        
        while(count($data->players) >= $limit){
            $count = addplayers($data, $count);
            $data = json_decode(playerdata($limit, $start+$limit));
        }
        $count = addplayers($data, $count);
        return $count;
    }

    function playerdata($limit, $start){
        return file_get_contents(Setting::get('NFL_API_URI')."/players/researchinfo?format=json&count=$limit&offset=$start&season=".Season::find(Setting::get("ACTIVE_SEASON_ID"))->name);
    }

    function addplayers($data, $count){
        foreach($data->players as $player){
            if(!in_array($player->position, ['DL','LB','DB'])){
                Player::updateOrCreate([
                    'id' => $player->id,
                ], [
                    'esbid' => $player->esbid,
                    'gsisPlayerId' => $player->gsisPlayerId,
                    'firstname' => $player->firstName,
                    'lastname' => $player->lastName,
                    'teamAbbr' => $player->teamAbbr,
                    'position' => $player->position,
                ]);
                $count++;
            }
        }
        return $count;
    }
    
    add_cron('/yearly/update_player_list.php', "Player List Updated: $count");

?>