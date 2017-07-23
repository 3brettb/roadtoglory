<div class="draft draft-board">
    <?php $draft_teams = league()->teams->load('team_picks'); $colsize = 200; $rowheight = 100; ?>
    @component('components.box.default', ['title' => 'Board', 'collapse' => true, 'style' => ['box' => 'overflow: hidden;']])
        @slot('body')
            <div class="row no-margin">
                <div class="col-xs-3" style="margin-top: 20px;">
                    @foreach($draft_teams as $team)
                        <div class="col-xs-2 draft-position" style="height: {{$rowheight}}px;">
                            <span>1</span>
                        </div>
                        <div class="col-xs-10 draft-team" style="height: {{$rowheight}}px;">
                            <span>{{$team->display('{N} {M}')}}</span>
                        </div>
                    @endforeach
                </div>
                <div class="col-xs-9" style="overflow-x: scroll;">
                    <div class="header" style="width: {{$colsize*$draft->rounds}}px; ">
                        @for($i = 1; $i <= $draft->rounds; $i++)
                            <div class="pull-left text-center" style="width: {{$colsize}}px; height: 20px;">
                                <span>Round {{$i}}</span>
                            </div>
                        @endfor
                    </div>
                    @foreach($draft_teams as $team)
                        <div class="draft-picks" style="width: {{$colsize*$draft->rounds}}px;">
                            @foreach($team->team_picks as $pick)
                                <div class="draft-pick-box pull-left" style="width: {{$colsize}}px; height: {{$rowheight}}px;">
                                    <div class="draft-pick text-center">
                                        <div>{{$pick->owner->display('{N} {M}')}}</div>
                                        @if($draft->completed)
                                            <hr>
                                            <div>#{{$pick->overall}} Player Name</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endslot
    @endcomponent
    
</div>

