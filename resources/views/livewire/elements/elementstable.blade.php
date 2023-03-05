
<div class="first-data backcolor" x-data="{selection: @entangle('selection').defer}">



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
            <label for="name">Ajouter un element :</label>
            <input type="text" wire:model.defer="name">
            <label for="name">Unité :</label>
            <select name="" id="" wire:model.defer="unit">
                <option value=""></option>
                @foreach ($preunits as $unit)

                    <option value="{{$unit}}">{{$unit}}</option>
                @endforeach
            </select>
            <label for="price">Prix :</label>
            <input type="number" name="price" step="0.01" wire:model.defer="price">
            <label for="calories">Calories :</label>
            <input type="number" name="calories" step="0.01" wire:model.defer="calories">
            <button type="submit" class="mybutton">Save</button>
            @error("element.name")
            {{$message}}
            @enderror
            @error("element.unit")
            {{$message}}
            @enderror
            @error("element.price")
            {{$message}}
            @enderror
            @error("element.calories")
            {{$message}}
            @enderror
        </form>

    </div>


    <div class="title"><h3>Mes Elements</h3></div>

    <div class="elements">
        <button class="mybutton" x-show="selection.length > 0" x-on:click="$wire.deleteElements(selection)" > Supprimer </button>
        <div class="search" style="width:100%">
        <input  style="width:100%" wire:model="search" type="text" placeholder="Chercher un element..."/>
        </div>
        <table>
            <thead>
            <tr>
                <th></th>
                <th scope="col" wire:click="setOrderField('name')">Nom</th>
                <th scope="col">Unit</th>
                <th scope="col">Prix</th>
                <th scope="col">Calories</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($elements as $element)
                <tr>
                    <td><input  type="checkbox"  x-model.defer="selection" value="{{$element->id}}"  >
                    </td>
                    <td data-label="Nom"><a href="#">{{ $element->name }}</a></td>
                    <td data-label="Unit"><a href="#">{{ $element->unit }}</a></td>
                    <td data-label="Coût">{{ $element->price }} &#8364;</td>
                    <td data-label="Calories">{{ $element->calories }} KJ</td>
                    <td data-label="Actions">
                        <button class="mybutton" type="button"><i class="far fa-eye"></i></button>
                        <button class="mybutton" type="button" wire:click="EditThis('{{ $element -> id }}')"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>


                @if( $editId === $element -> id )

                    <livewire:elements.element-form :element="$element" :key="$element->id"/>


                @endif
            @endforeach

            </tbody>
        </table>

        {{ $elements->links('vendor.pagination.default') }}
        


    </div>

</div>

