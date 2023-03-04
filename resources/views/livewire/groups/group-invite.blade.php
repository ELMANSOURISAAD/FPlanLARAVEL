
<td colspan="4">
    <form action="" wire:submit.prevent="invite">
        <label for="user">user</label>
        <input type="text" name="user" wire:model.defer="user">

        <input type="submit" value="Go">
    </form>

    @error("user")
        {{$message}}
        @enderror
</td>
