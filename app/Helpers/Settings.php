<?php

namespace App\Helpers;

use App\Models\Setting;
use App\Models\Types\SettingType;
use App\Models\Types\SettingCategory;

class Settings 
{

    private $defaults = [
        // Operations
        'TRADING_ACTIVE' => ['type' => 2, 'category' => 8, 'value' => 1],
        'OFFSEASON_ACTIVE' => ['type' => 2, 'category' => 8, 'value' => 1],
        'ROSTER_ADD_ACTIVE' => ['type' => 2, 'category' => 8, 'value' => 1],
        'ROSTER_MOVE_ACTIVE' => ['type' => 2, 'category' => 8, 'value' => 1],
        'CURRENT_ROSTER_MAX' => ['type' => 5, 'category' => 8, 'value' => 20],
        'LEAGUE_TIME_ZONE' => ['type' => 1, 'category' => 8, 'value' => 'ET'],
        'ALLOW_ADD_IR' => ['type' => 2, 'category' => 8, 'value' => 1],
        'ALLOW_TRADE_IR' => ['type' => 2, 'category' => 8, 'value' => 1],

        // League
        'LEAGUE_SIZE' => ['type' => 5, 'category' => 4, 'value' => 10],
        'TEAM_OWNERS' => ['type' => 5, 'category' => 4, 'value' => 1],
        'DIVISIONS' => ['type' => 5, 'category' => 4, 'value' => 2],
        
        // Roster
        'STARTING_QUARTERBACK' => ['type' => 5, 'category' => 5, 'value' => 1],
        'STARTING_RUNNING_BACK' => ['type' => 5, 'category' => 5, 'value' => 0],
        'STARTING_WIDE_RECEIVER' => ['type' => 5, 'category' => 5, 'value' => 2],
        'STARTING_TIGHT_END' => ['type' => 5, 'category' => 5, 'value' => 0],
        'STARTING_RB_TE' => ['type' => 5, 'category' => 5, 'value' => 1],
        'STARTING_TE_WR' => ['type' => 5, 'category' => 5, 'value' => 1],
        'STARTING_FLEX' => ['type' => 5, 'category' => 5, 'value' => 1],
        'STARTING_KICKER' => ['type' => 5, 'category' => 5, 'value' => 1],
        'STARTING_DEFENSE' => ['type' => 5, 'category' => 5, 'value' => 1],
        'MAX_QUARTERBACK' => ['type' => 5, 'category' => 5, 'value' => 3],
        'MAX_RUNNING_BACK' => ['type' => 5, 'category' => 5, 'value' => null],
        'MAX_WIDE_RECEIVER' => ['type' => 5, 'category' => 5, 'value' => null],
        'MAX_TIGHTEND' => ['type' => 5, 'category' => 5, 'value' => null],
        'MAX_KICKER' => ['type' => 5, 'category' => 5, 'value' => 2],
        'MAX_DEFENSE' => ['type' => 5, 'category' => 5, 'value' => 2],
        'MAX_IR' => ['type' => 5, 'category' => 5, 'value' => 4],
        'MAX_KEEPERS' => ['type' => 5, 'category' => 5, 'value' => 4],
        'LOCK_ON_DAY' => ['type' => 2, 'category' => 5, 'value' => 0],
        'LOCK_DAY' => ['type' => 1, 'category' => 5, 'value' => null],
        'LOCK_TIME' => ['type' => 1, 'category' => 5, 'value' => null],
        
        // Waivers
        'WAIVER_BY_DAY' => ['type' => 2, 'category' => 6, 'value' => 1],
        'WAIVER_UNLOCK' => ['type' => 8, 'category' => 6, 'value' => ], // Multivalue
        'WAIVER_RETENTION_TIME' => ['type' => 1, 'category' => 6, 'value' => 6],
        
        // Trading
        'TRADE_DEADLINE' => ['type' => 5, 'category' => 7, 'value' => 13],
        'TRADE_AT_DRAFT' => ['type' => 2, 'category' => 7, 'value' => 1],
        'TRADE_TEAMS' => ['type' => 5, 'category' => 7, 'value' => -1],
        'ALLOW_PICKS' => ['type' => 2, 'category' => 7, 'value' => 1],

        'ALLOW_LEAGUE_APPROVE' => ['type' => 2, 'category' => 7, 'value' => 0],
        'ALLOW_LEAGUE_VETO' => ['type' => 2, 'category' => 7, 'value' => 1],
        'ALLOW_ADMIN_APPROVE' => ['type' => 2, 'category' => 7, 'value' => 1],
        'ALLOW_ADMIN_VETO' => ['type' => 2, 'category' => 7, 'value' => 1],
        'LEAGUE_APPROVE_VOTES' => ['type' => 5, 'category' => 7, 'value' => 0],
        'LEAGUE_VETO_VOTES' => ['type' => 5, 'category' => 7, 'value' => 5],
        'ADMIN_APPROVE_VOTES' => ['type' => 5, 'category' => 7, 'value' => 3],
        'ADMIN_VETO_VOTES' => ['type' => 5, 'category' => 7, 'value' => 3],
        'TRADE_AUTO_PROCESS' => ['type' => 2, 'category' => 7, 'value' => 0],
        'TRADE_PROCESS' => ['type' => 8, 'category' => 7, 'value' => ], // Multivalue
        'TRADE_PRIOR_SUBMIT_DEADLINE' => ['type' => 7, 'category' => , 'value' => ],
        
        // Scoring
        'QUARTERBACK_PASS_YARDS' => ['type' => 5, 'category' => 1, 'value' => 25],
        'QUARTERBACK_RUSH_YARDS' => ['type' => 5, 'category' => 1, 'value' => 25],
        'QUARTERBACK_PASS_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'QUARTERBACK_RUSH_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'QUARTERBACK_PASS_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 4],
        'QUARTERBACK_RUSH_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 4],
        'QUARTERBACK_INTERCEPTION' => ['type' => 5, 'category' => 1, 'value' => -2],
        'QUARTERBACK_FUMBLE' => ['type' => 5, 'category' => 1, 'value' => -2],
        'RUNNINGBACK_PASS_YARDS' => ['type' => 5, 'category' => 1, 'value' => 25],
        'RUNNINGBACK_RUSH_YARDS' => ['type' => 5, 'category' => 1, 'value' => 10],
        'RUNNINGBACK_PASS_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'RUNNINGBACK_RUSH_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'RUNNINGBACK_PASS_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 4],
        'RUNNINGBACK_RUSH_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 6],
        'RUNNINGBACK_INTERCEPTION' => ['type' => 5, 'category' => 1, 'value' => -2],
        'RUNNINGBACK_FUMBLE' => ['type' => 5, 'category' => 1, 'value' => -2],
        'WIDERECEIVER_PASS_YARDS' => ['type' => 5, 'category' => 1, 'value' => 25],
        'WIDERECEIVER_RUSH_YARDS' => ['type' => 5, 'category' => 1, 'value' => 10],
        'WIDERECEIVER_PASS_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'WIDERECEIVER_RUSH_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'WIDERECEIVER_PASS_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 4],
        'WIDERECEIVER_RUSH_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 6],
        'WIDERECEIVER_INTERCEPTION' => ['type' => 5, 'category' => 1, 'value' => -2],
        'WIDERECEIVER_FUMBLE' => ['type' => 5, 'category' => 1, 'value' => -2],
        'TIGHTEND_PASS_YARDS' => ['type' => 5, 'category' => 1, 'value' => 25],
        'TIGHTEND_RUSH_YARDS' => ['type' => 5, 'category' => 1, 'value' => 10],
        'TIGHTEND_PASS_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'TIGHTEND_RUSH_YARDS_POINTS' => ['type' => 5, 'category' => 1, 'value' => 1],
        'TIGHTEND_PASS_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 4],
        'TIGHTEND_RUSH_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 6],
        'TIGHTEND_INTERCEPTION' => ['type' => 5, 'category' => 1, 'value' => -2],
        'TIGHTEND_FUMBLE' => ['type' => 5, 'category' => 1, 'value' => -2], 
        'KICKER_XTRA_MADE' => ['type' => 5, 'category' => 1, 'value' => 1],
        'KICKER_XTRA_MISS' => ['type' => 5, 'category' => 1, 'value' => -1],
        'KICKER_FG_39' => ['type' => 5, 'category' => 1, 'value' => 3],
        'KICKER_FG_49' => ['type' => 5, 'category' => 1, 'value' => 4],
        'KICKER_FG_50+' => ['type' => 5, 'category' => 1, 'value' => 5],
        'KICKER_FG_Miss' => ['type' => 5, 'category' => 1, 'value' => -1],
        'DEFENSE_TOUCHDOWN' => ['type' => 5, 'category' => 1, 'value' => 6],
        'DEFENSE_CONVERSION_2' => ['type' => 5, 'category' => 1, 'value' => 2],
        'DEFENSE_CONVERSION_1' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_SACK' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_FUMBLE' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_INTERCEPTION' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_YARDS_99' => ['type' => 5, 'category' => 1, 'value' => 2],
        'DEFENSE_YARDS_224' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_YARDS_349' => ['type' => 5, 'category' => 1, 'value' => 0],
        'DEFENSE_YARDS_350+' => ['type' => 5, 'category' => 1, 'value' => -1],
        'DEFENSE_POINTS_0' => ['type' => 5, 'category' => 1, 'value' => 4],
        'DEFENSE_POINTS_5' => ['type' => 5, 'category' => 1, 'value' => 3],
        'DEFENSE_POINTS_11' => ['type' => 5, 'category' => 1, 'value' => 2],
        'DEFENSE_POINTS_20' => ['type' => 5, 'category' => 1, 'value' => 1],
        'DEFENSE_POINTS_31' => ['type' => 5, 'category' => 1, 'value' => 0],
        'DEFENSE_POINTS_32+' => ['type' => 5, 'category' => 1, 'value' => -1],
        
        // Playoffs
        'PLAYOFF_TEAMS' => ['type' => 5, 'category' => 3, 'value' => 5],
        'PLAYOFF_MATCHUP_WEEKS' => ['type' => 5, 'category' => 3, 'value' => 1],
        'PLAYOFF_START_WEEK' => ['type' => 5, 'category' => 3, 'value' => 14],
        'PLAYOFF_END_WEEK' => ['type' => 5, 'category' => 3, 'value' => 16],
        'CONSOLATION' => ['type' => 2, 'category' => 3, 'value' => 1],
        
        // Schedule
        'SEASON_START_WEEK' => ['type' => 5, 'category' => 2, 'value' => 1],
        'SEASON_END_WEEK' => ['type' => 5, 'category' => 2, 'value' => 13],
    ];

}