        <div style="max-height: 100%">

            @if(($recettes->isNotEmpty()))
                <select style="width:100%" name="" id="" wire:model.defer="recette_id">
                    <option value="0"></option>
                    @foreach($recettes as $recette)

                        <option value="{{$recette->id}}">{{$recette->name}}</option>
                    @endforeach
                </select>
                <button class="myButton" wire:click="AjouterRepasDay('{{$day}}')" wire:key="time().$carbonDate"> Ajouter </button>
            @else
                Pas de recettes.
            @endif


        </div>
