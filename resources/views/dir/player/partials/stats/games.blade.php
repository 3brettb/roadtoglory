<div class="player-stats">
    @component('components.box.default', ['title' => 'Game Stats', 'collapse' => true])
        @slot('body')
            <table class="table-bordered" style="width: 100%;">
                <thead>
                    <th title="Week">WK</th>
                    <th title="Opponent">Opp</th>
                    <th title="Fantasy Points">Pts</th>
                    <!-- Iterate Through Columns -->
                </thead>
                <tbody>
                    <!-- Iterate Through Columns -->
                </tbody>
            </table>
        @endslot
    @endcomponent
</div>