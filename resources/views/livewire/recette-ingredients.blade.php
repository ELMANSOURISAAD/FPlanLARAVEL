<tr><td colspan="5">
    <form action="" wire:submit.prevent="save">

            @foreach ($recette->elements()->get() as $element)
                {{$element->name}}
            @endforeach

</form>
</td>
</tr>
