<tr><td colspan="5">
    <form action="" wire:submit.prevent="save">
        <label for="name">name</label>
        <input type="text" wire:model.defer="recette.name">
        <button class="mybutton" type="submit">Save</button>
        @error("recette.name")
        {{$message}}
        @enderror
    </form>
</td>
</tr>
