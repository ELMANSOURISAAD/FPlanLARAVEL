<div class="left backcolor">
    <div class="profile">

        <div class="operations">
            <div class="flex">
            <h3 style="color:#361E92">Food </h3> <h3 style="color:#F3A358">Planning </h3>
            </div>
            <a href="/Settings">
                <i class="fa-solid fa-gear icone" title="Settings"></i>
            </a>

        </div>
        <div class="hamburger">
            <i class="menuIcon fa fa-bars"> </i>
            <i class="closeIcon fa fa-close"> </i>
        </div>
    </div>
    <div class="menu showMenu">
        <ul class="flexlist flexgap">
            <a href="{{ route('Calendar') }}"><li>

                    @if(Route::current()->getName() == 'Calendar')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif

                    &#x0023;Calendar
                    <i class="fa-solid fa-house"></i>
                </li></a>


            <a href="{{ route('Recettes') }}"><li>
                    @if(Route::current()->getName() == 'Recettes')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;MES RECETTE <i class="fa-solid fa-plate-wheat"></i></li></a>


            <a href="{{ route('Ingredients') }}"><li>
                    @if(Route::current()->getName() == 'Ingredients')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;INGREDIENTS <i class="fa-solid fa-egg"></i></li></a>



            <a href="{{ route('Inventaires') }}"><li>
                    @if(Route::current()->getName() == 'Inventaires')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;INVENTAIRE <i class="fa-solid fa-basket-shopping"></i>
                </li>
            </a>

            <a href="{{ route('Reporting') }}"><li>
                    @if(Route::current()->getName() == 'Reporting')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;Reporting <i class="fa-solid fa-cash-register"></i>
                </li>
            </a>




            <a href="{{ route('Inventaires') }}">
                <li>
                    @if(Route::current()->getName() == 'Groups')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;GROUPS
                    <i class="fa-solid fa-user-group"></i></li></a>
        </ul>
    </div>

    <livewire:logout></livewire:logout>
</div>
