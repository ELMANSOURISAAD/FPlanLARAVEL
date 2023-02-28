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
        <ul class="flexlist flexgap">
            <a href="{{ route('Calendar') }}"><li>

                    
                    <i class="fa-solid fa-house"></i>
                    <span @if(Route::current()->getName() == 'Calendar')
                            class="selectedmenu"
                        @endif>Calendar</span>
                    </li></a>


            <a href="{{ route('Recettes') }}"><li>
                   
                    <i class="fa-solid fa-plate-wheat"></i>
                    <span class=" @if(Route::current()->getName() == 'Recettes')
                        
                        @endif">MES RECETTE</span> 
                
                </li></a>


            <a href="{{ route('Ingredients') }}"><li>
                    
                    <i class="fa-solid fa-egg"></i>
                    <span @if(Route::current()->getName() == 'Ingredients')
                        @endif>INGREDIENTS</span> 
                
                </li></a>



            <a href="{{ route('Inventaires') }}"><li>

                    <i class="fa-solid fa-basket-shopping"></i>
                    <span @if(Route::current()->getName() == 'Inventaires')
                        class="selectedmenu"
                        @endif>INVENTAIRE</span>     
                </li>
            </a>

            <a href="{{ route('Reporting') }}"><li>

                    <i class="fa-solid fa-cash-register"></i>
                    <span @if(Route::current()->getName() == 'Reporting')
                        class="selectedmenu"
                        @endif>Reporting</span>
                     
                </li>
            </a>




            <a href="{{ route('Inventaires') }}">
                <li>
                    
                    <i class="fa-solid fa-user-group"></i>
                    <span @if(Route::current()->getName() == 'Groups')
                        class="selectedmenu"
                        @endif>GROUPS</span>
                    </li></a>
        </ul>
    </div>

    <livewire:logout></livewire:logout>
</div>
