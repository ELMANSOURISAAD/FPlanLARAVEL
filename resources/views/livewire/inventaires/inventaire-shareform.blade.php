
<td colspan="7">
    <form class="inform" action="" wire:submit.prevent="share">
        <label for="pourcentage">Quantité</label>
        <input type="number" name="quantity" wire:model.defer="quantity">
        <select name="group" id="" wire:model.defer="group">
            <option value=""></option>
            @foreach ($groups as $group)

                <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Enregistrer">
    </form>

    @error("quantity")
        {{$message}}
        @enderror

        @error("unit")
        {{$message}}
        @enderror
</td>
