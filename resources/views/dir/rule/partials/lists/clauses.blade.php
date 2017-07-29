<div class="rule clauses">
    @foreach($sections as $section)
        @component('components.box.default', ['title' => $section->toString(), 'collapse' => true, 'id' => "section-$section->id"])
            @slot('buttons')
                <span>
                    <a href="#contents">Table of Contents</a>
                </span>
            @endslot
            @slot('body')
                @include('dir.rule.partials.lists.articles', ['articles' => $section->children()->where('type_id', 2)->get()])
            @endslot
        @endcomponent
    @endforeach
</div>