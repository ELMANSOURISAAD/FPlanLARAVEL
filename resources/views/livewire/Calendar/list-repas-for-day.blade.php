<ul>
    @forelse ($repas as $repass)
        <li >&#9632; {{$repass->recette->name}} &#10003;</li>
    @empty
        <li style="color:#C0C0C0"> NO RECORDS </li>
    @endforelse

</ul>
