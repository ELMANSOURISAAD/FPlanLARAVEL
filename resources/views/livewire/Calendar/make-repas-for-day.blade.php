        <div>
        <select name="" id="" wire:model.defer="recette_id">
            <option value=""></option>
            @foreach($recettes as $recette)
                <option value="{{$recette->id}}">{{$recette->name}}</option>
            @endforeach
        </select>
        <button class="myButton" wire:click="AjouterRepasDay('{{$day}}')"> Ajouter </button>
            @error("recette_id")
            {{$message}}
            @enderror
        </div>
