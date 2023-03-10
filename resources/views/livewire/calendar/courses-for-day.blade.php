<div>
    @if (!$repas->IsEmpty())
    &#9632;  Courses cumulées :
    <ul style="text-align: left">

       @forelse ($MissingInventory as $name=>$quantity)

            <li>{{$name}}: {{$quantity['quantity']}} {{$quantity['unit']}}</li>
            <?php  $totalprice += $quantity['quantity'] * $quantity['price']?>


        @empty

        @endforelse


        <span style="color:tomato">Total : {{ $totalprice }} &euro; </span>
        <button wire:click="CreateCourseDay(true)" class="myButton">

            <i class="fa-regular fa-square-plus"  style="cursor: grab;color:red;font-size: 10px"></i></button>
    @else


     @endif

     <?php  $totalprice = 0;?>






<br>


    </ul>


</div>
