<div>
    <div>
    <ul>
    @forelse ($repas as $repass)
        @if($repass->recette)
        <li style="display: block;">&#9632; {{$repass->recette->name}}
            <i class="fa-solid fa-xmark" wire:click="DeleteRepasFromDay('{{$repass -> id}}')" style="cursor: pointer;color:red;font-size: 10px"></i>

        </li>
        @endif
    @empty
        <li style="color:#C0C0C0"> NO RECORDS </li>
    @endforelse
    </ul>
    </div>

    <div>
    <ul>
        @foreach ($stats as $name=>$stat)
            <li style="color:cornflowerblue" >{{$name}} : {{$stat}}  </li>
        @endforeach
        <div>
            @forelse ($MissingInventory as $name=>$quantity)
                <li style="color:tomato" >{{$name}} -> {{$quantity['quantity']}} {{$quantity['unit']}} </li>

            @empty
            @endforelse
        </div>
    </ul>
    </div>
</div>

