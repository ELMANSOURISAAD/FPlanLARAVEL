<tr><td colspan="5">
        <div>
            <form action="" wire:submit.prevent="addIngredientToRecette">
            <label for="Name">Add an ingredient :</label>
            <select name="" id="" wire:model.defer="element_toadd">
                <option value=""></option>
                @foreach ($elements as $element)

                <option value="{{$element->id}}">{{$element->name}}</option>
                @endforeach
            </select>
                <label for="quantity">Quantity</label>
                <input type="number" step="0.01" wire:model.defer="quantity_toadd">
                <button type="submit" class="mybutton"> Go </button>
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
                    {{$element->name}} x {{$element->pivot->quantity}}
                    </div>
                    <i class="fa-solid fa-xmark" wire:click="DeleteIngredientFromRecette('{{$element -> id}}')" style="cursor: grab;color:red;font-size: 10px"></i>
                @endforeach
        </div>
</td>
</tr>
