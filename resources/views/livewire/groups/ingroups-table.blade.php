
<div  class="first-data backcolor" x-data="{selection: @entangle('selection').defer}">

    <div style="width:100%;border-radius: 30px;background-color:#FB9300;display:flex;justify-content:space-between">
        <div style="padding:10px">
        <h3 style='color:white;'>Partager vos repas entre groupe! (ex Colocation) </h3>
        <p style='font-size:0.7em;color:white;opacity:0.7'>Upload your own home-made recipe, and share it with the other members of the community</p>
        </div>
        <img  src="{{ asset('images/svg/paela.svg') }}" class="imagerotate" height = "100%" width = "200px">
    </div>

    <div class="panel" style="display:flex;flex-direction: row;justify-content: space-between;    width: 100%;color:#222A23;">

    <button class="mybutton" x-show="selection.length > 0" x-on:click="$wire.deleteGroups(selection)"> Supprimer </button>

    <form action="" wire:submit.prevent="add(Object.fromEntries(new FormData($event.target)))">
        <label for="name">Creer un group :</label>
        <input type="text" wire:model.defer="name">
        <input type="checkbox" name="incluregroupe" id="" checked>
        <label for="incluregroupe">M'inclure dans le groupe</label>
        <button type="submit" class="mybutton">Save</button>
        @error("group.name")
        {{$message}}
        @enderror
    </form>




</div>

<div class="groups">
    <div class="title" ><h3>Admin</h3></div>

    <table>
        <thead>
        <tr>
            <th></th>
            <th scope="col" wire:click="setOrderField('name')">Nom</th>
            <th scope="col">Members</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($groups as $group)
            <tr>
                <td><input  type="checkbox"  x-model.defer="selection" value="{{$group->id}}"  >
                </td>
                <td data-label="Nom"><a href="#">{{ $group->name }}</a></td>
                <td>{{count($group->users)}}</td>

            </tr>





        @endforeach

        </tbody>
    </table>

    {{ $groups->appends(request()->input())->links('vendor.pagination.default') }}





</div>

</div>


