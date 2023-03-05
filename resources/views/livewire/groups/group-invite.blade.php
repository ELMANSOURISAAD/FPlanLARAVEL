
<td colspan="4">
    <form class="inform" action="" wire:submit.prevent="invite">
        <label for="user">Inviter un ami  </label>
         <input type="text" name="user" wire:model.defer="user">

        <button class="mybutton" type="submit">Enregistrer</button>

    </form>

    @error("user")
        {{$message}}
        @enderror
</td>
