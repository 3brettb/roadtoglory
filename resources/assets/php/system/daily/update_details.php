#! usr/bin/php
<?php

    include_once(app_path().'\Helpers\System\system.php');
    include_once(app_path().'\Helpers\Players\players.php');

    use \App\ResourceModels\Players\Setting;
    use \App\ResourceModels\Players\Player;

    set_time_limit(10000);

    $players = Player::all();

    $count = 0;
    
    foreach($players as $player){
        $data = getData($player->id);
        if($data){
            $d = $data->players[0];
            $player->update([
                'name' => $d->name,
                'status' => $d->status,
                'injuryGameStatus' => $d->injuryGameStatus,
                'jerseyNumber' => $d->jerseyNumber,
            ]);
            foreach($d->weeks as $week){
                $player->details()->updateOrCreate([
                    'week' => $week->id,
                ],[
                    'opponent' => $week->opponent,
                    'gameResult' => $week->gameResult,
                    'gameDate' => $week->gameDate,
                    'stats' => json_encode($week->stats),
                ]);
            }
            $count++;
        }
        
    }

    add_cron("/daily/update_details.php", "Player Details Updated: $count");

    function getData($id){
        try{
            return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/details?format=json&playerId=$id&statType=seasonStats"));
        } catch (Exception $e){
            return null;
        }
    }