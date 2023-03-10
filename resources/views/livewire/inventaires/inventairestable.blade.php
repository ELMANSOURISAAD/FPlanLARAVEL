
<div class="first-data backcolor" x-data="{selection: @entangle('selection').defer}">


    <div style="width:100%;border-radius: 30px;background-color:#FB9300;display:flex;justify-content:space-between">
        <div style="padding:10px">
        <h3 style='color:white;'>Gerer votre cuisine</h3>
        <p style='font-size:0.7em;color:white;opacity:0.7'>Upload your own home-made recipe, and share it with the other members of the community</p>
        </div>
        <img  src="{{ asset('images/svg/paela.svg') }}" class="imagerotate" height = "100%" width = "200px">
    </div>

    <div  style="display:flex;flex-direction: row;justify-content: space-between;width: 100%;color:#222A23">

        <form style="  font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;" action="" wire:submit.prevent="add">
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
            <button class="mybutton" type="submit">Save</button>
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



    </div>
    <div class="title"><h3>Mon Inventaire  </h3> </div>
    <div>
    <button class="mybutton" wire:click="ListeDeCourse()"><i class="fa-solid fa-file-import"></i> Generer la liste de course</button>
    <button class="mybutton" wire:click="ProposerRecettes()"><i class="fa-solid fa-wand-magic-sparkles"></i> Recettes magiques !</button>
    </div>

    <div class="elements">
        <button class="mybutton" x-show="selection.length > 0" x-on:click="$wire.deleteInventaires(selection)" > Supprimer </button>
        <div class="search" style="width:100%">
        <input  style="width:100%" wire:model="search" type="text" placeholder="Chercher un element..."/>
        </div>
        <table>
            <thead>
            <tr>
                <th></th>
                <th scope="col" wire:click="setOrderField('name')">Nom</th>

                <th scope="col">Unité</th>
                <th scope="col">Stock</th>
                <th scope="col">Partages</th>
                <th scope="col">Manquants</th>
                <th scope="col">Actions</th>

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
                    <td data-label="Shared">

                        @forelse ($inventaire->groups as $share)
                            {{ $share->name }} -> {{ $share->pivot->quantity }} {{ $share->pivot->unit }}

                            <i class="fa-solid fa-xmark" wire:click="DeleteInventaireFromGroupe('{{$inventaire -> id}}','{{$share -> id}}')" style="cursor: grab;color:red;font-size: 10px"></i>
                            <br>
                        @empty

                        @endforelse

                    </td>
                    <td style="color:red" data-label="Missing">
                        @forelse ($inventaire->courses as $course)
                            {{ $course->pivot->quantity }} {{ $course->pivot->unit }}
                            <br>
                        @empty

                        @endforelse

                    </td>
                    <td data-label="Actions" style="display:flex">
                        <button class="mybutton" type="button" wire:click="EditThis('{{$inventaire->id}}')"><i class="fas fa-edit"></i> Modifier le stock</button>
                        <button class="mybutton" type="button" wire:click="ShareThis('{{$inventaire->id}}')"><i class="fa-solid fa-square-share-nodes"></i> Partager avec le groupe</button>
                    </td>
                </tr>


                @if( $editId === $inventaire -> id )

                    <livewire:inventaires.inventaire-form :inventaire="$inventaire" :key="time().$inventaire->id"/>

                @endif

                @if( $shareId === $inventaire -> id )

                    <livewire:inventaires.inventaire-shareform :inventaire="$inventaire" :key="time().$inventaire->id"/>

                @endif
            @endforeach

            </tbody>
        </table>
        {{ $inventaires->links('vendor.pagination.default')}}

        @if (session()->has('testflash'))

            {{ session('testflash') }}

        @endif



    </div>


</div>

