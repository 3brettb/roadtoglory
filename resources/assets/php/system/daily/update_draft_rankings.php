#! usr/bin/php
<?php

    use \App\ResourceModels\Players\Setting;

    $count = 0;
    
    $start = 0;
    $limit = 100;
    $stop = false;

    while(!$stop){
        $data = getData($start, $limit);
        if(count($data->players) > 0){
            foreach($data->players as $p){
                if($player = player_exists($p)){
                    $player->draftranking()->updateOrCreate([], [
                        'rank' => $p->rank,
                        'auction' => ($p->auction == "") ? 0 : $p->auction,
                        'stock' => $p->stock,
                    ]);
                    $count++;
                }
            }
        }
        else{
            $stop = true;
        }
        $start += $limit;
    }

    add_cron("/custom/update_draft_ranks.php", "Player Draft Ranks Updated: $count");

    function getData($start, $limit){
        try{
            return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/editordraftranks?format=json&count=$limit&offset=$start"));
        } catch (Exception $e){
            return null;
        }
    }