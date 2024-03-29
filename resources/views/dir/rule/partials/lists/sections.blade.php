<div class="rule sections">
    @foreach($sections as $section)
        @component('components.box.default', ['title' => $section->toString(), 'class' => 'rule-box', 'collapse' => true, 'id' => "section-$section->id"])
            @slot('buttons')
                <span>
                    <a href="#contents">Table of Contents</a>
                </span>
            @endslot
            @slot('body')
                <div class="child">
                    {!! $section->description; !!}
                </div>
                @include('dir.rule.partials.lists.children', ['children' => $section->children, 'id' => "section-$section->id"])
            @endslot
        @endcomponent
    @endforeach
</div>