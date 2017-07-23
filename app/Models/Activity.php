<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Activity extends Model
{
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'league_id', 'reference_type', 'reference_id', 'reference_uri', 'type_id', 'user_id'
    ];

    public function routeto(){
        //return url("/activity/$this->id");
        return $this->reference->routeto();
    }

    public function type(){
        return $this->belongsTo(\App\Models\Types\ActivityType::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function alerts(){
        return $this->morphedByMany(Alert::class, 'activityable');
    }

    public function chats(){
        return $this->morphedByMany(Chat::class, 'activityable');
    }

    public function comments(){
        return $this->morphedByMany(Comment::class, 'activityable');
    }

    public function divisions(){
        return $this->morphedByMany(Division::class, 'activityable');
    }

    public function drafts(){
        return $this->morphedByMany(Draft::class, 'activityable');
    }

    public function events(){
        return $this->morphedByMany(\App\Models\Event::class, 'activityable');
    }

    public function ireligibles(){
        return $this->morphedByMany(IREligble::class, 'activityable');
    }

    public function leagues(){
        return $this->morphedByMany(League::class, 'activityable');
    }

    public function matchups(){
        return $this->morphedByMany(Matchup::class, 'activityable');
    }

    public function messages(){
        return $this->morphedByMany(Message::class, 'activityable');
    }

    public function message_recipients(){
        return $this->morphedByMany(MessageRecipient::class, 'activityable');
    }

    public function permissions(){
        return $this->morphedByMany(Permission::class, 'activityable');
    }

    public function players(){
        return $this->morphedByMany(Player::class, 'activityable');
    }

    public function polls(){
        return $this->morphedByMany(Poll::class, 'activityable');
    }

    public function poll_responses(){
        return $this->morphedByMany(PollResponse::class, 'activityable');
    }

    public function requests(){
        return $this->morphedByMany(Request::class, 'activityable');
    }

    public function request_updates(){
        return $this->morphedByMany(RequestUpdate::class, 'activityable');
    }

    public function rosters(){
        return $this->morphedByMany(Roster::class, 'activityable');
    }

    public function roster_players(){
        return $this->morphedByMany(RosterPlayer::class, 'activityable');
    }

    public function rules(){
        return $this->morphedByMany(Rule::class, 'activityable');
    }

    public function seasons(){
        return $this->morphedByMany(Season::class, 'activityable');
    }

    public function settings(){
        return $this->morphedByMany(Setting::class, 'activityable');
    }

    public function stats(){
        return $this->morphedByMany(Stat::class, 'activityable');
    }

    public function teams(){
        return $this->morphedByMany(Team::class, 'activityable');
    }

    public function trades(){
        return $this->morphedByMany(Trade::class, 'activityable');
    }

    public function users(){
        return $this->morphedByMany(\App\User::class, 'activityable');
    }

    public function waivers(){
        return $this->morphedByMany(Waiver::class, 'activityable');
    }

    public function waiver_claims(){
        return $this->morphedByMany(WaiverClaim::class, 'activityable');
    }

    public function waiver_orders(){
        return $this->morphedByMany(WaiverOrder::class, 'activityable');
    }

    public function weeks(){
        return $this->morphedByMany(Week::class, 'activityable');
    }

    public function rankings(){
        return $this->morphedByMany(WeekStanding::class, 'activityable');
    }

    public function weekstats(){
        return $this->morphedByMany(WeekStat::class, 'activityable');
    }

}