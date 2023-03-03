
<div  class="first-data backcolor">

    I own : <br>
    @forelse ($groups as $group)
    {{ $group }}
    <br>
    @empty
    NOTHING TO SHOW
    @endforelse

    <br><br>

    I belong to :
    @forelse ($ingroups as $group)
    {{ $group }}
    @empty
    NOTHING TO SHOW
    @endforelse

</div>

