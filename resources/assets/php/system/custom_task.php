<?php

    //dd($task_data);

    use \App\ResourceModels\Players\Stat;
    use \App\ResourceModels\Players\StatSet;
    use \App\ResourceModels\Players\Setting;
    use \App\ResourceModels\Players\Season;
    use \App\ResourceModels\Players\Player;
    use \App\ResourceModels\Players\PlayerStat;

    set_time_limit(3600);
    
    $season = Season::find($task_data->season_id);

    foreach($task_data->weeks as $key => $week){
        $data = json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/stats?format=json&season=".$season->name."&week=$week&statType=weekStats")); 
        if($data->players){
            $set = StatSet::find($season->name.$week);
            if(!$set){
                $set = new StatSet();
                $set->id = "$season->name"."$week";
                $set->season_id = $season->id;
                $set->save();
            }
            foreach($data->players as $player){
                $p = Player::find($player->id);
                if($p){
                    foreach($player->stats as $key => $value){
                        $hash = md5($key.$value);
                        $s = (Stat::findByHash($hash)) ? Stat::findByHash($hash) : new Stat();
                        $s->hash = $hash;
                        $s->category_id = $key;
                        $s->value = $value;
                        $s->save();

                        $ps = (PlayerStat::statExists($player->id, $s->id)) ? PlayerStat::statExists($player->id, $s->id) : new PlayerStat();
                        $ps->player_id = $player->id;
                        $ps->stat_set_id = $set->id;
                        $ps->stat_id = $s->id;
                        $ps->save();
                    }
                    $p->name = $player->name;
                    $p->save();
                }
            }
        }
    }

    $completed = true;

?>