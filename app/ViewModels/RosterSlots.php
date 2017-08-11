<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

use App\Models\Position;
use App\Models\RosterPlayer;
use App\Models\Resource\Players\Player as SystemPlayer;

class RosterSlots extends Model
{

    public $starter;

    public $bench;

    public $ir;

    private $settings;

    private $starterslots;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->settings = league()->settings;
        $this->starter = collect();
        $this->bench = collect();
        $this->ir = collect();
        $this->getStarterSlots();
    }

    public function getStarterSlots()
    {
        $this->starterslots = [
            1 => $this->settings->where('name', 'STARTING_QUARTERBACK')->first()->value, //QB
            2 => $this->settings->where('name', 'STARTING_RUNNING_BACK')->first()->value, //RB
            3 => $this->settings->where('name', 'STARTING_WIDE_RECEIVER')->first()->value, //WR
            4 => $this->settings->where('name', 'STARTING_TIGHT_END')->first()->value, //TE
            5 => $this->settings->where('name', 'STARTING_FLEX')->first()->value, //FLEX
            6 => $this->settings->where('name', 'STARTING_RB_WR')->first()->value, //RB/WR
            7 => $this->settings->where('name', 'STARTING_TE_WR')->first()->value, //TE/WR
            8 => $this->settings->where('name', 'STARTING_KICKER')->first()->value, //Kicker
            9 => $this->settings->where('name', 'STARTING_DEFENSE')->first()->value, //DEF
        ];
        $loc = 0;
        foreach($this->starterslots as $id => $size)
        {
            for($i=0;$i<$size;$i++)
            {
                $this->starter->push(new RosterSlot($this->getPosition($id), $loc++));
            }
        }
    }

    public function addPlayer(SystemPlayer $player)
    {
        $player->pivot->load('position');
        if($player->pivot->position->starter)
        {
            $this->addStarter($player, $player->pivot);
        } else {
            if($player->pivot->place >= 0)
            {
                $this->addBench($player, $player->pivot);
            } else {
                $this->addIr($player, $player->pivot);
            }
        }
    }

    public function addStarter(SystemPlayer $player, RosterPlayer $pivot)
    {
        //dd($player, $player->pivot, $player->pivot->load('position'), $player->pivot->position);
        $this->starter->push(new RosterSlot($pivot->position, $pivot->place, $player));
    }

    public function addBench(SystemPlayer $player, RosterPlayer $pivot)
    {
        $this->bench->push(new RosterSlot($pivot->position, $pivot->place, $player));
    }

    public function addIr(SystemPlayer $player, RosterPlayer $pivot)
    {
        $this->ir->push(new RosterSlot($pivot->position, $pivot->place, $player));
    }

    private function getPosition($id)
    {
        return Position::find($id);
    }

}