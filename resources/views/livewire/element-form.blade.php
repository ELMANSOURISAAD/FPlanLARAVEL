<td colspan="5">
    <form action="" wire:submit.prevent="save">
        <label for="name">name</label>
        <input type="text" wire:model.defer="element.name">
        <button type="submit">Save</button>
        @error("element.name")
        {{$message}}
        @enderror
    </form>
</td>
