<tr><td colspan="5">
    <form class="inform" action="" wire:submit.prevent="save">
        <label for="name">name</label>
        <input type="text" wire:model.defer="recette.name">
        <button class="mybutton" type="submit">Enregistrer</button>
        @error("recette.name")
        {{$message}}
        @enderror
    </form>
</td>
</tr>
