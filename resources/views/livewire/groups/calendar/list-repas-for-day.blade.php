<div style="max-height: 100%">



    @if ($repas)
            &#9632; Group Meals :
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







</div>

