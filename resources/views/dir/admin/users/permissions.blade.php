@extends('layout.admin')

@push('on_ready')
    $("#users").addClass('active');
    $("#permissions").addClass('active');
@endpush

@section('title')
    | Admin Portal | User Permissions
@endsection

@section('pagetitle')
    <h1>User Permissions <small>{{league()->name}}</small></h1>
@endsection

@section('content')
    
    <div class="row" style="overflow-y:scroll">
        
        <table class="table table-condensed table-bordered">
            <thead>
                <th>First</th>
                <th>Last</th>
                @foreach($users[1]->permission->default as $item)
                    <th>{{$item->name}}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach($users as $user)
                    @php
                        $self = $user->id == user()->id;
                    @endphp
                    <tr>
                        @if($self)
                            <td><b>{{$user->firstname}}</b></td>
                            <td><b>{{$user->lastname}}</b></td>
                        @else
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                        @endif

                        @foreach($user->permission->getPermissions() as $permission)
                            <?php $value = ($permission->value) ? 1 : 0; ?>
                            <td>
                                @if(!$self)
                                    <a data-user="{{$user->id}}" data-bit="{{$permission->bit}}" data-value="{{$value}}" class="clickable permission">
                                @endif

                                @if($permission->value)
                                    <span class="text-success"><b>Yes</b></span>
                                @else
                                    <span class="text-danger">No</span>
                                @endif
                                
                                @if(!$self)
                                    </a>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection

@push('scripts')

    <script>

        $("a.permission").on('click', function(){
            userid = parseInt($(this).data('user'));
            bit = parseInt($(this).data('bit'));
            value = parseInt($(this).data('value'));
            a = this;

            new_value = (value == 1) ? 0 : 1;

            axios.post("{{route('action.admin.user.permission.update')}}", {
                userid: userid,
                bit: bit,
                value: new_value
            }).then(function(response){
                $(a).data('value', new_value);
                if($(a).data('value') == 1){
                    $(a).html('<span class="text-success"><b>Yes</b></span>');
                } else {
                    $(a).html('<span class="text-danger">No</span>');
                }
            });
            
        });

    </script>

@endpush

