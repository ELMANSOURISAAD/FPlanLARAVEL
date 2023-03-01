<tr><td colspan="6">
    <form action="" wire:submit.prevent="save">
        <label for="name">name</label>
        <input class="mybuttonW" type="text" wire:model.defer="recette.name">
        <button class="mybuttonW" type="submit">Save</button>
        @error("recette.name")
        {{$message}}
        @enderror
    </form>
</td>
</tr>
