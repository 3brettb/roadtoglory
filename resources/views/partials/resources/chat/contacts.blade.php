<div class="chat-contacts {{$class or ''}}">
    <ul class="contacts-list">
        @if($contacts)
            @foreach($contacts as $contact)
                <li>
                    <a href="#">
                        <img class="contacts-list-img" src="{{ URL::asset($contact->image) }}" alt="User Image">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                {{$contact->display('{F} {L}')}}
                                <!-- Date of Most recent chat sent -->
                                <small class="contacts-list-date pull-right">{{$contact->recent}}</small>
                            </span>
                            <span class="contacts-list-msg">{{$contact->last->content}}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>