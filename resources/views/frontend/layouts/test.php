@foreach($contents->where('parent_id',null)->get() as $parent)
    <ul class=list-group>{{$parent->name}}
        @if($parent->child->count() > 1)
            @foreach($parent->child as $child)
                @if($child->child->count() > 1)
                    <li class="list-group-item">{{$child->name}}
                    @else
                    <li class="list-group-item">{{$child->name}}</li>
                @endif
                @if($child->child->count() > 1)
                    <ul class="list-group">{{$child->name}}
                        @foreach($child->child as $gChild)
                            <li class="list-group-item">{{$gChild->name}}</li>
                        @endforeach
                    </ul>
                @endif
                @if($child->child->count() > 1)
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
@endforeach
