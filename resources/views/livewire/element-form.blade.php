<td colspan="5">
    <form action="" wire:submit.prevent="save">
        <label for="name">name</label>
        <input type="text" wire:model.defer="element.name">
        <label for="unit">unit</label>
        <input type="text" wire:model.defer="element.unit">
        <button type="submit">Save</button>
        @error("element.name")
        {{$message}}
        @enderror
        @error("element.unit")
        {{$message}}
        @enderror
    </form>
</td>
