<?php

namespace App\Helpers\Admin;

class Generate
{

    static function Draft($season_id){

    }

    static function DraftPicks($draft, $type_id = 1){
        for($i=1; $i <= $draft->rounds; $i++){
            foreach(league()->teams as $team){
                $draft->picks()->create([
                    'team_id' => $team->id,
                    'round' => $i,
                    'type_id' => $type_id
                ]);
            }
        }
        return true;
    }

}