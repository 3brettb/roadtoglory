<form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
    {{csrf_field()}}
</form>