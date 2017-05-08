#! usr/bin/php
<?php

    include_once(app_path().'\Helpers\System\system.php');
    include_once(app_path().'\Helpers\Players\players.php');

    use \App\ResourceModels\Players\Setting;

    set_time_limit(3000);

    $start = 0;
    $limit = 1000;
    $stop = false;

    // Add notes until duplicate note and stop
    while(!$stop){
        $data = getData($start, $limit);
        foreach($data as $pos){
            foreach($pos as $p){
                if($player = player_exists($p)){
                    $stats = $p->stats;
                    $player->update([
                        'status' => $p->status,
                    ]);
                    $player->advanced()->updateOrCreate([], [
                        'carries' => $stats->Carries,
                        'touches' => $stats->Touches,
                        'receptions' => $stats->Receptions,
                        'targets' => $stats->Targets,
                        'receptionpercentage' => $stats->ReceptionPercentage,
                        'redzonetargets' => $stats->RedzoneTargets,
                        'redzonetouches' => $stats->RedzoneTouches,
                        'redzoneg2g' => $stats->RedzoneG2g,
                    ]);
                }
            }
        }
        $stop = true;
    }

    add_cron("/daily/update_advanced.php", "Player Advanced Stats Updated");

    function getData($start, $limit){
        return json_decode(file_get_contents(Setting::get('NFL_API_URI')."/players/advanced?format=json&offset=$start&count=$limit"));
    }