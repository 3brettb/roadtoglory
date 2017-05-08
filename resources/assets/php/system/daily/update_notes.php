#! usr/bin/php
<?php

    include_once(app_path().'\Helpers\System\system.php');
    include_once(app_path().'\Helpers\Players\players.php');

    use \App\ResourceModels\Players\Setting;

    $start = 0;
    $limit = 100;
    $stop = false;

    // Add notes until duplicate note and stop
    while(!$stop){
        $data = getData($start, $limit);

        foreach($data->news as $item){
            if($player = player_exists($item)){
                if(!note_exists($item)){
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
        $start += $limit;
    }

    add_cron("/daily/update_notes.php", "Player Notes Updated");

    function getData($start, $limit){
        return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/news?format=json&offset=$start&count=$limit"));
    }