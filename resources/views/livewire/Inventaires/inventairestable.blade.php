
<div class="first-data backcolor" x-data="{selection: @entangle('selection').defer}">

    <div class="panel" style="display:flex;flex-direction: row;justify-content: space-between;width: 100%;color:#222A23">

        <button x-show="selection.length > 0" x-on:click="$wire.deleteInventaires(selection)" > Supprimer </button>

        <form action="" wire:submit.prevent="add">
            <label for="name">Ajouter un element :</label>
            <select name="" id="" wire:model.defer="name">
                <option value=""></option>
                @foreach ($elements as $element)
                    <option value="{{$element->name}}">{{$element->name}}</option>
                @endforeach
            </select>
            <label for="name">Unité :</label>
            <select name="" id="" wire:model.defer="unit">
                <option value=""></option>
                @foreach ($stockpreunits as $unite)

                    <option value="{{$unite}}">{{$unite}}</option>
                @endforeach
            </select>
            <label for="stock">Stock :</label>
            <input type="number" step="0.01" wire:model.defer="stock">
            <button type="submit">Save</button>
            @error("inventaire.name")
            {{$message}}
            @enderror

            @error("inventaire.price")
            {{$message}}
            @enderror
            @error("inventaire.stock")
            {{$message}}
            @enderror
        </form>
        <input wire:model="search" type="text" placeholder="Chercher un element..."/>
    </div>
    <div class="title"><h3>Mon Inventaire</h3></div>

    <div class="elements">
        <table>
            <thead>
            <tr>
                <th></th>
                <th scope="col" wire:click="setOrderField('name')">Nom</th>

                <th scope="col">Unité</th>
                <th scope="col">Stock</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inventaires as $inventaire)
                <tr>
                    <td><input  type="checkbox"  x-model.defer="selection" value="{{$inventaire->id}}"  >
                    </td>
                    <td data-label="Nom"><a href="#">{{ $inventaire->name }}</a></td>
                    <td data-label="unit">{{ $inventaire->unit }} </td>
                    <td data-label="Stock">{{ $inventaire->stock }}</td>
                    <td data-label="Actions">
                        <button type="button"><i class="far fa-eye"></i></button>
                        <button type="button" wire:click="EditThis('{{$inventaire->id}}')"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>


                @if( $editId === $inventaire -> id )

                    <livewire:inventaires.inventaire-form :inventaire="$inventaire" :key="$inventaire->id"/>


                @endif
            @endforeach

            </tbody>
        </table>
        {{ $inventaires->links() }}



    </div>

</div>

