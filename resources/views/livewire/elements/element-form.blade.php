
<td colspan="6">
    <form action="" wire:submit.prevent="save">
        <label for="name">Nom</label>
        <input type="text" wire:model.defer="element.name">
        <label for="unit">Unité (g/l/piece)</label>
        <select name="" id="" wire:model.defer="element.unit">
            <option value=""></option>
            @foreach ($preunits as $unit)

                <option value="{{$unit}}">{{$unit}}</option>
            @endforeach
        </select>
        <label for="unit">price (€)</label>
        <input type="number" step="0.01" wire:model.defer="element.price">
        <button class="mybutton" type="submit">Enregistrer</button>
        @error("element.name")
        {{$message}}
        @enderror
        @error("element.unit")
        {{$message}}
        @enderror
        @error("element.price")
        {{$message}}
        @enderror
    </form>
</td>
