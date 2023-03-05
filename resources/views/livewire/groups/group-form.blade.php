
<td colspan="4">
    <form class="inform" action="" wire:submit.prevent="save">
        <label for="name">Nom</label>
        <input type="text" name="name" wire:model.defer="group.name">
        <button class="mybutton" type="submit">Enregistrer</button>
        @error("group.name")
        {{$message}}
        @enderror
    </form>
</td>
