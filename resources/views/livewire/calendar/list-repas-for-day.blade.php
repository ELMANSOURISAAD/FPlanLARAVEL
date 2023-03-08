<div style="max-height: 100%">
    @if ($repas)
            &#9632;  Meals :
            <ul>
                @forelse ($repas as $repass)
                    @if($repass->recette)
                    <li style="display: block;">{{$repass->recette->name}}
                        <i class="fa-solid fa-xmark" wire:click="DeleteRepasFromDay('{{$repass -> id}}')" style="cursor: pointer;color:red;font-size: 10px"></i>

                    </li>
                    @endif
                @empty
                    <li style="color:#C0C0C0"> NO MEALS </li>
                @endforelse
                </ul>
     @endif






    @if ($stats)
            &#9632;  Stats :
            <ul>

                @foreach ($stats as $stat=>$data)
                        <li style="color:cornflowerblue" >{{$stat}} : {{$data['value']}} {{$data['unit']}} </li>
                    @endforeach
                </ul>
     @endif


     @if ($MissingInventory)
     <span style="color:tomato">&#9632;  Missing Inventory !</span>
     <ul>

       {{--   @forelse ($MissingInventory as $name=>$quantity)
             <li style="color:tomato" >{{$name}} -> {{$quantity['quantity']}} {{$quantity['unit']}} </li>

         @empty
         @endforelse --}}

 </ul>
@endif


</div>

