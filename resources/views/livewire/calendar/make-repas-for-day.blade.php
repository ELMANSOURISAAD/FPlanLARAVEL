        <div>

            @if(($recettes->isNotEmpty()))
                <select name="" id="" wire:model.defer="recette_id">
                    <option value="0"></option>
                    @foreach($recettes as $recette)

                        <option value="{{$recette->id}}">{{$recette->name}}</option>
                    @endforeach
                </select>
                <button class="myButton" wire:click="AjouterRepasDay('{{$day}}')"> Ajouter </button>
            @else
                Pas de recettes.
            @endif


        </div>
