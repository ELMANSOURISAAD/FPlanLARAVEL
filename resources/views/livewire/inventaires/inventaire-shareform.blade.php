
<td colspan="5">
    <form action="" wire:submit.prevent="share">
        <label for="pourcentage">Pourcentage</label>
        <input type="number" name="pourcentage" wire:model.defer="pourcentage">
        <select name="group" id="" wire:model.defer="group">
            @foreach ($groups as $group)
            <option value=""></option>
                <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Go">
    </form>

    @error("pourcentage")
        {{$message}}
        @enderror
</td>
