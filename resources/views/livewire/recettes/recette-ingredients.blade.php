<tr><td colspan="5">
        <div>
            <form class="inform" action="" wire:submit.prevent="addIngredientToRecette">
            <label for="Name">Ajouter un ingredient :</label>
            <select name="" id="" wire:model.defer="element_toadd" wire:change="updateFrontUnit">
                <option value=""></option>
                @foreach ($elements as $element)

                <option value="{{$element->id}}">{{$element->name}}</option>
                @endforeach
            </select>
                <label for="quantity"> quantité </label>
                <input type="number" step="1" wire:model.defer="quantity_toadd"><i>{{ $unitFront }}</i>
                <button type="submit" class="mybutton"> Enregistrer </button>
            </form>
        </div>
        @if (session()->has('ElementDeleted'))
            <div>
                {{ session('ElementDeleted') }}
            </div>
        @endif
        <div style='margin:10px;height:120px;background-color: white;display:flex;gap:10px'>

                @foreach ($recette->elements()->get() as $element)
                    <div style="  background: #eee; box-shadow: 0 1px 1px rgb(0 0 0 / 0.2);;height:20px;">
                    {{$element->name}} - {{$element->pivot->quantity}} {{$element->unit}}
                    </div>
                    <i class="fa-solid fa-xmark" wire:click="DeleteIngredientFromRecette('{{$element -> id}}')" style="cursor: grab;color:red;font-size: 10px"></i>
                @endforeach
        </div>
</td>
</tr>
