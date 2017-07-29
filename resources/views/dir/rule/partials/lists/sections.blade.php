<div class="rule sections">
    @foreach($sections as $section)
        @component('components.box.default', ['title' => $section->toString(), 'collapse' => true, 'id' => "section-$section->id"])
            @slot('buttons')
                <span>
                    <a href="#contents">Table of Contents</a>
                </span>
            @endslot
            @slot('body')
                <div>
                    {!! $section->description; !!}
                </div>
                @include('dir.rule.partials.lists.children', ['children' => $section->children, 'id' => "section-$section->id"])
            @endslot
        @endcomponent
    @endforeach
</div>