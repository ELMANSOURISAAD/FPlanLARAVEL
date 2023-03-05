
<div  class="first-data backcolor">

    <div style="width:100%;border-radius: 30px;background-color:#FB9300;display:flex;justify-content:space-between">
        <div style="padding:10px">
        <h3 style='color:white;'>Partager vos repas entre groupe! (ex Colocation) </h3>
        <p style='font-size:0.7em;color:white;opacity:0.7'>Upload your own home-made recipe, and share it with the other members of the community</p>
        </div>
        <img  src="{{ asset('images/svg/paela.svg') }}" class="imagerotate" height = "100%" width = "200px">
    </div>



<div class="groups">
    <div class="title" ><h3>Groupes</h3></div>

    <table>
        <thead>
        <tr>

            <th scope="col" wire:click="setOrderField('name')">Nom</th>
            <th scope="col">Members</th>
            <th scope="col">Calendrier</th>

        </tr>
        </thead>
        <tbody>

        @forelse ($groups as $group)
            <tr>

                <td data-label="Nom"><a href="#">{{ $group->name }}</a></td>
                <td>{{count($group->users)}}</td>
                <td data-label="Actions">
                    <button class="mybutton" type="button" wire:click="SeeInventaire('{{ $group -> id }}')"><i class="far fa-eye"></i></button>
                    <button type="button" class="mybutton"><i class="fa-regular fa-calendar-days"></i></button>
                    <button type="button" class="mybutton" wire:click="LeaveGroup('{{ $group -> id }}')"><i class="fa-solid fa-right-from-bracket"></i></button>
                 </td>

            </tr>


            @if( $inventaireShares === $group -> id )

            <livewire:groups.group-inventaire :group="$group" :key="time().$group->id"/>


            @endif

        @empty
        <tr>
            <td colspan="3" style="text-align: center"> NO RECORDS </td>
        </tr>


        @endforelse

        </tbody>
    </table>

    {{ $groups->appends(request()->input())->links('vendor.pagination.default') }}





</div>

</div>


