@extends('layout.app')

@push('on_ready')
  $("#rankings").addClass('active');
@endpush

@section('title')
    | Rankings
@endsection

@section('pagetitle')
    <h1>{{season()->year}} {{league()->name}} Rankings 
        @if($rankings)
            <small>Week {{$rankings->week->number}}</small>
        @endif
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Rankings</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @component('components.bars.action')
                {!! Form::select('week', [], null) !!}
            @endcomponent
            @component('components.box.default', ['title' => 'Rankings', 'collapse' => true])
                @slot('body')
                    @if($rankings)
                        @include('widgets.rankings.large', ['rankings' => $rankings])
                    @else
                        <p>There are no rankings to display at this time.</p>
                    @endif
                @endslot
                @slot('footer')
                    @if($rankings)
                        @include('inserts.line.updated', ['when' => $rankings->updated_at])
                    @endif
                @endslot
            @endcomponent
        </div>
    </div>
@endsection