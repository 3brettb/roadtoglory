<div class="player-stats">
    @component('components.box.default', ['title' => 'Season Stats', 'collapse' => true])
        @slot('body')
            <table class="table-bordered" style="width: 100%;">
                <thead>
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