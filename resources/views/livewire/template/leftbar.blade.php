<div class="left backcolor">
    <div class="profile">

        <div class="operations">
            <div class="flex">
            <h3 style="color:#361E92">Food </h3> <h3 style="color:#F3A358">Planning </h3>
            </div>


        </div>
        <div class="hamburger">
            <i class="menuIcon fa fa-bars"> </i>
            <i class="closeIcon fa fa-close"> </i>
        </div>
    </div>
    <div class="menu showMenu">
        <ul class="flexlist">
            <a href="{{ route('Calendar') }}">
                <li @if(Route::current()->getName() == 'Calendar')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>


                    <i class="fa-solid fa-house"></i>
                    <span @if(Route::current()->getName() == 'Calendar')
                            class="selectedmenu"
                        @endif>Calendar</span>
                    </li></a>


            <a href="{{ route('Recettes') }}"><li @if(Route::current()->getName() == 'Recettes')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-plate-wheat"></i>
                    <span @if(Route::current()->getName() == 'Recettes')
                        class="selectedmenu"
                        @endif">Recettes</span>

                </li></a>


            <a href="{{ route('Ingredients') }}"><li @if(Route::current()->getName() == 'Ingredients')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-egg"></i>
                    <span @if(Route::current()->getName() == 'Ingredients')
                        class="selectedmenu"
                        @endif>Ingrédients</span>

                </li></a>



            <a href="{{ route('Inventaires') }}"><li @if(Route::current()->getName() == 'Inventaires')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-basket-shopping"></i>
                    <span @if(Route::current()->getName() == 'Inventaires')
                        class="selectedmenu"
                        @endif>Inventaire</span>
                </li>
            </a>

            <a href="{{ route('Reporting') }}"><li @if(Route::current()->getName() == 'Reporting')
                class="selectedmenu"
                @else
                class="menuitem"
                @endif>

                    <i class="fa-solid fa-cash-register"></i>
                    <span @if(Route::current()->getName() == 'Reporting')
                        class="selectedmenu"
                        @endif>Reporting</span>

                </li>
            </a>




            <a href="{{ route('Inventaires') }}">
                <li @if(Route::current()->getName() == 'Groups')
                    class="selectedmenu"
                    @else
                class="menuitem"
                    @endif>

                    <i class="fa-solid fa-user-group"></i>
                    <span @if(Route::current()->getName() == 'Groups')
                        class="selectedmenu"
                        @endif>Groups</span>
                    </li></a>
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
