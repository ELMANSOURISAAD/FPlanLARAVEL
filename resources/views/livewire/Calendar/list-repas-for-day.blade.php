<div style="height: 80%;
    justify-content: space-between;
    display: flex;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;">
    <ul >
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
    <ul>
        @foreach ($stats as $name=>$stat)
            <li style="color:cornflowerblue" >{{$name}} : {{$stat}} &euro; </li>

        @endforeach
        <div>
            @forelse ($MissingInventory as $name=>$quantity)
                <li style="color:tomato" >{{$name}} -> {{$quantity}} </li>

            @empty
            @endforelse
        </div>
    </ul>

</div>
