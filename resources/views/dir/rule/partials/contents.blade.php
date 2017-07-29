<div class="rule rule-contents" id="contents">
    @component('components.box.default', ['collapse' => true, 'title' => 'Table of Contents'])
        @slot('body')
            @foreach($rules->sections as $section)
                <h4><a href="#section-{{$section->id}}">{{$section->toString()}}</a></h4>
                <ul class="rule rule-contents-list">
                    @foreach($section->children()->where('type_id', 2)->get() as $article)
                        <li><a href="#article-{{$article->id}}">{{$article->toString()}}</a></li>
                    @endforeach
                </ul>
            @endforeach
        @endslot
    @endcomponent
</div>