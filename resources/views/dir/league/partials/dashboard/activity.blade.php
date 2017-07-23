<div id="newsletter">
    @component('components.box.default', ['title' => 'Recent Activity', 'collapse' => true])
        @slot('body')
            @include('partials.resources.activity.list', ['list' => $activity->recent])
        @endslot
        @slot('footer')
            <div class="text-center">
                <a href="url('/activity')" class="uppercase">View All Activity</a>
            </div>
        @endslot
    @endcomponent
</div>