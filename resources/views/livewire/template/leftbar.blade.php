<div class="left backcolor">
    <div class="profile">

        <div class="operations">
            <div class="flex">
            <h3 style="color:#361E92">Food </h3> <h3 style="color:#F3A358">Planning </h3>


            </div>

        </div>
        <div style="font-size: xx-small"> Mail : {{ $user->email }} <br> User : {{ $user->name }}</div>

    </div>
    <div class="menu showMenu">
        <ul class="flexlist">
            <a href="{{ route('Calendar') }}">
                <li @if($route == 'Calendar')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>


                <i class="fa-regular fa-calendar-days"></i>Calendar
                    </li>
            </a>


            <a href="{{ route('Recettes') }}">
                <li @if($route == 'Recettes')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-plate-wheat"></i>Recettes

                </li>
            </a>


            <a href="{{ route('Ingredients') }}"><li @if($route == 'Ingredients')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-egg"></i>Ingrédients

                </li>
            </a>



            <a href="{{ route('Inventaires') }}">

                <li @if($route == 'Inventaires')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-basket-shopping"></i>Inventaire
                    <span style="color:red;font-size:xx-small">@if ($count_courses>0)({{$count_courses}})@endif </span>
                </li>
            </a>




            <a  href="{{ route('Ingroups') }}">

                <li @if($route == 'Ingroups')
                    class="selectedmenu"
                    @else
                class="menuitem"
                    @endif>

                    <i class="fa-solid fa-circle-user"></i>Groupes
                    </li>
                </a>


            <a  href="{{ route('Mygroups') }}">
                <li @if($route == 'Mygroups')
                    class="selectedmenu"
                    @else
                class="menuitem"
                    @endif>

                    <i class="fa-brands fa-watchman-monitoring"></i>Administrer</span>
                    </li>
                </a>


{{--

                <a href="{{ route('Reporting') }}"><li @if($route == 'Reporting')
                    class="selectedmenu"
                    @else
                    class="menuitem"
                    @endif>

                        <i class="fa-solid fa-cash-register"></i>
                        <span @if($route == 'Reporting')
                            class="selectedmenu"
                            @endif>Reporting</span>

                    </li>
                </a> --}}


        </ul>

    </div>
    <div>
        <img  src="{{ asset('images/family_lq.png') }}" alt="" height="200px">

    </div>
    <div>
        <div style="  padding: 10px;border-radius: 0 0 30px 30px;background-color:#FB9300;display:flex;justify-content:space-around;flex-direction:column;align-items: center;">
            <div style="width:100%">

                    <p>Share recipes with the community</p>

            </div>
            <div style="text-align: center;width:80%;color:#FB9300;border-radius: 30px;background-color:#FFFFFF">
                    Upload now!
            </div>


        </div>
    </div>


</div>
