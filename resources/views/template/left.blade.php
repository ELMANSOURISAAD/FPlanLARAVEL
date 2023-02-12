<div class="left backcolor">
    <div class="profile">
        <img src="{{ asset('images/user.png') }}" alt="" class="user_image" />
        <div class="operations">
            <h3>Hello </h3>
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
            <a href="{{ route('Dashboard') }}"><li>

                    @if(Route::current()->getName() == 'Dashboard')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif

                    &#x0023;HOME
                    <i class="fa-solid fa-house"></i>
                </li></a>



            <a href="{{ route('Groups') }}">
                <li>
                    @if(Route::current()->getName() == 'Groups')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;GROUPS
                    <i class="fa-solid fa-user-group"></i></li></a>

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



            <a href="{{ route('Inventaire') }}"><li>
                    @if(Route::current()->getName() == 'Inventaire')
                        <span style="color: Tomato"><i class="fa-solid fa-chevron-right"></i></span>
                    @endif
                    &#x0023;INVENTAIRE <i class="fa-solid fa-basket-shopping"></i>
                </li>
            </a>
        </ul>
    </div>
</div>
