
<td colspan="7">
    <form class="inform" action="" wire:submit.prevent="save">
        <label for="name">Nom</label>

        <select name="" id="" wire:model.defer="inventaire.name">
            <option value=""></option>
            @foreach ($elements as $element)

                <option value="{{$element->name}}">{{$element->name}}</option>
            @endforeach
        </select>


        <label for="unit">Unité</label>
        <select name="" id="" wire:model.defer="inventaire.unit">
            <option value=""></option>
            @foreach ($stockpreunits as $unit)

                <option value="{{$unit}}">{{$unit}}</option>
            @endforeach
        </select>
        <label for="unit">Stock</label>
        <input type="number" step="1" wire:model.defer="inventaire.stock">
        <button class="mybutton" type="submit">Enregistrer</button>
        @error("inventaire.name")
        {{$message}}
        @enderror
        @error("inventaire.unit")
        {{$message}}
        @enderror
        @error("inventaire.stock")
        {{$message}}
        @enderror
    </form>
</td>
