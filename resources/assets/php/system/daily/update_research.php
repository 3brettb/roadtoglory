#! usr/bin/php
<?php

    use \App\ResourceModels\Players\Setting;

    $start = 0;
    $limit = 100;
    $stop = false;

    // Add notes until duplicate note and stop
    while(!$stop){
        $data = getData($start, $limit);
        
        foreach($data->players as $item){
            if($player = player_exists($item)){
                if($item->percentOwned){
                    $player->research()->updateOrCreate([], [
                        'percentOwned' => $item->percentOwned,
                        'percentOwnedChange' => $item->percentOwnedChange,
                        'percentStarted' => $item->percentStarted,
                        'percentStartedChange' => $item->percentStartedChange,
                        'depthChartOrder' => $item->depthChartOrder,
                        'numAdds' => $item->numAdds,
                        'numDrops' => $item->numDrops,
                    ]);
                }
                else{
                    $stop = true;
                    break;
                }
            }
        }
        $start += $limit;
    }

    add_cron("/daily/update_research.php", "Player Research Updated");

    function getData($start, $limit){
        return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/researchinfo?format=json&offset=$start&count=$limit"));
    }