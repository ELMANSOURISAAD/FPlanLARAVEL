
<div x-data="{selection: @entangle('selection').defer}">

        <div class="panel" style="display:flex;flex-direction: row;justify-content: space-between">

        <button x-show="selection.length > 0" x-on:click="$wire.deleteRecettes(selection)"> Supprimer </button>

        <form action="" wire:submit.prevent="add">
            <label for="name">Ajouter une recette :</label>
            <input type="text" wire:model.defer="name">
            <button type="submit">Save</button>
            @error("name")
            {{$message}}
            @enderror
        </form>
        <input wire:model="search" type="text" placeholder="Chercher une recette..."/>
        </div>
    <div class="title"><h3>Mes recettes</h3></div>

    <div class="recettes">
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
            @foreach ($recettes as $recette)
                <tr>
                    <td><input  type="checkbox"  x-model.defer="selection" value="{{$recette->id}}"  >
                    </td>
                    <td data-label="Nom"><a href="#">{{ $recette->name }}</a></td>
                    <td data-label="Coût">673 &#8364;</td>
                    <td data-label="CreatedAt">{{ $recette->created_at }}</td>
                    <td data-label="Actions">
                        <button type="button"><i class="far fa-eye"></i></button>
                        <button type="button" wire:click="EditThis('{{ $recette -> id }}')"><i class="fas fa-edit"></i></button>
                        <button type="button" wire:click="editIngredientsId('{{ $recette -> id }}')"><i class="fas fa-gear" title="voir les ingredients"></i></button>
                    </td>
                </tr>


            @if( $editId === $recette -> id )

                <livewire:recette-form :recette="$recette" :key="time().$recette->id"/>


            @endif
            @if( $editIngredientsId === $recette -> id )

             <livewire:recette-ingredients :recette="$recette" :key="time().$recette->id"/>


            @endif


            @endforeach

            </tbody>
        </table>
        {{ $recettes->links() }}



    </div>

</div>

