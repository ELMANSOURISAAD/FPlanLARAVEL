
        <select name="" id="">
            @foreach($recettes as $recette)
                <option value="{{$recette->id}}">{{$recette->name}}</option>
            @endforeach
        </select>
