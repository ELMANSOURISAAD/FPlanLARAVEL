<div>@if ($stats)
    &#9632;  Stats :
    <ul>

        @foreach ($stats as $stat=>$data)
                <li style="color:cornflowerblue" >{{$stat}} : {{$data['value']}} {{$data['unit']}} </li>
            @endforeach
        </ul>
    @endif</div>
