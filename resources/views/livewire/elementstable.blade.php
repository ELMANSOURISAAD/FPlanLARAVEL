
<div x-data="{selection: @entangle('selection').defer}">

    <div class="panel" style="display:flex;flex-direction: row;justify-content: space-between">

        <button x-show="selection.length > 0" x-on:click="$wire.deleteElements(selection)" > Supprimer </button>

        <form action="" wire:submit.prevent="add">
            <label for="name">Ajouter un element :</label>
            <input type="text" wire:model.defer="name">
            <button type="submit">Save</button>
            @error("name")
            {{$message}}
            @enderror
        </form>
        <input wire:model="search" type="text" placeholder="Chercher un element..."/>
    </div>
    <div class="title"><h3>Mes Elements</h3></div>

    <div class="elements">
        <table>
            <thead>
            <tr>
                <th></th>
                <th scope="col" wire:click="setOrderField('name')">Nom</th>
                <th scope="col">Coût</th>
                <th scope="col">CreatedAt</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($elements as $element)
                <tr>
                    <td><input  type="checkbox"  x-model.defer="selection" value="{{$element->id}}"  >
                    </td>
                    <td data-label="Nom"><a href="#">{{ $element->name }}</a></td>
                    <td data-label="Coût">673 &#8364;</td>
                    <td data-label="CreatedAt">{{ $element->created_at }}</td>
                    <td data-label="Actions">
                        <button type="button"><i class="far fa-eye"></i></button>
                        <button type="button" wire:click="EditThis('{{ $element -> id }}')"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>


                @if( $editId === $element -> id )

                    <livewire:element-form :element="$element" :key="$element->id"/>


                @endif
            @endforeach

            </tbody>
        </table>
        {{ $elements->links() }}



    </div>

</div>

