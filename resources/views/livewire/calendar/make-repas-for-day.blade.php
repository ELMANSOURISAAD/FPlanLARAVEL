        <div style="max-height: 100%">

            @if(($recettes->isNotEmpty()))
                <select style="width:100%"  wire:model.defer="recette_id">
                    <option value="0"></option>
                    @foreach($recettes as $recette)

                        <option value="{{$recette->id}}">{{$recette->name}}</option>
                    @endforeach
                </select>
                <button class="myButton" wire:click="AjouterRepasDay('{{$day}}')" :key="now().$carbonDate"> Ajouter </button>
            @else
                Pas de recettes.
            @endif


        </div>
