

<td colspan="3">

    @foreach ($groupInventory as $inventory)

            {{ $inventory['name'] }} : {{ $inventory['quantity'] }} {{ $inventory['unit'] }}. <br>
    @endforeach

</td>

