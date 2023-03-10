
<div  class="first-data backcolor" x-data="{selection: @entangle('selection').defer}">



        <div style="width:100%;border-radius: 30px;background-color:#FB9300;display:flex;justify-content:space-between">
            <div style="padding:10px">
            <h3 style='color:white;'>Ajouter votre repas</h3>
            <p style='font-size:0.7em;color:white;opacity:0.7'>Upload your own home-made recipe, and share it with the other members of the community</p>
            </div>
            <img  src="{{ asset('images/svg/paela.svg') }}" class="imagerotate" height = "100%" width = "200px">
        </div>
        <div  style="display:flex;flex-direction: column;justify-content: center;;color:#222A23;">



        <form style="  font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;" action="" wire:submit.prevent="add">
            <label for="name">Ajouter une recette :</label>
            <input class="mybuttonW" type="text" wire:model.defer="name">
            <button class="mybutton" type="submit">Save</button>
            @error("name")
            {{$message}}
            @enderror
        </form>


        </div>

   <div class="title" ><h3>Mes recettes</h3></div>

    <div class="recettes">
        <button class="mybutton" x-show="selection.length > 0" x-on:click="$wire.deleteRecettes(selection)"> Supprimer </button>

        <div class="search" style="width:100%">
            <input  style="width:100%" wire:model="search" type="text" placeholder="Chercher un element..."/>
            </div>
        <table>
            <thead>
            <tr>
                <th></th>
                <th scope="col" wire:click="setOrderField('name')">Nom</th>
                <th scope="col">Coût</th>
                <th scope="col">Calories</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($recettes as $recette)
                <tr>
                    <td><input  type="checkbox"  x-model.defer="selection" value="{{$recette->id}}"  >
                    </td>
                    <td data-label="Nom"><a href="#">{{ $recette->name }}</a></td>
                    <td data-label="Coût">{{ $recette->price }} &#8364;</td>
                    <td data-label="Calorires">{{ $recette->calories }} KJ</td>
                    <td data-label="Actions" style="display:flex">

                        <button type="button" class="mybutton" wire:click="EditThis('{{ $recette -> id }}')"><i class="fas fa-edit"></i> Modifier </button>
                        <button type="button" class="mybutton" wire:click="editIngredientsId('{{ $recette -> id }}')"><i class="fas fa-gear" title="voir les ingredients"></i> Modifier les ingrédients </button>
                    </td>
                </tr>

                @if( $editIngredientsId === $recette -> id )

                    <livewire:recettes.recette-ingredients :recette="$recette" :key="time().$recette->id"/>

                @endif
            @if( $editId === $recette -> id )

                <livewire:recettes.recette-form :recette="$recette" :key="time().$recette->id"/>


            @endif




            @endforeach

            </tbody>
        </table>
        {{ $recettes->links('vendor.pagination.default') }}



    </div>

</div>

