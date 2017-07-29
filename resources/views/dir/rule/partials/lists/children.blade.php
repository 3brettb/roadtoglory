<div class="rule children">
    @foreach($children as $child)
        @if($child->children()->count() > 0)
            @component('components.box.default', ['title' => $child->toString(), 'collapse' => true, 'id' => "rule-$child->type_id-$child->id", 'noFooter' => true])
                @slot('buttons')
                    <span>
                        <a href="#{{$id}}">Top</a>
                    </span>
                @endslot
                @slot('body')
                    <div>
                        {!! $child->description !!}
                    </div>
                    @include('dir.rule.partials.lists.children', ['children' => $child->children, 'id' => "rule-$child->type_id-$child->id"])
                @endslot
            @endcomponent
        @else
            <div>
                <span>{{$child->toString()}}</span>
                {!! $child->description !!}
            </div>
        @endif
    @endforeach
</div>