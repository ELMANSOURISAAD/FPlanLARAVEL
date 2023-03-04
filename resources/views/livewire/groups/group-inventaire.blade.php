

<tr>
    @foreach ($groupInventory as $inventory)

            <td></td>
            <td data-label="Member"><a href="#">
             {{ $inventory->user->name}}
            </a></td>
            <td data-label="name"><a href="#">{{ $inventory->name }}</a></td>
            <td data-label="pourcentage"><a href="#">{{ $inventory->pivot->pourcentage }}%</a></td>







    @endforeach

</tr>
