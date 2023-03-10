
    <div class="first-data backcolor">
        <style>
            .container {


                grid-template-areas:
    "left Header Header Header Header right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right"
    "left first-data first-data first-data first-data right";
            }
            .first-data{
                display:flex;
            }
            #month-calendar{
                width: 100%;
            }

            .month{
                margin: 0;
                padding: 3rem 2rem 2rem;
                background: #FB9300;
                text-align: center;
                border-radius: 10px 10px 0px 0px;
                color: #ffffff;
                list-style: none;
            }

            .month li{
                padding: 0;
                margin: 0;
                font-size: 1.5rem;
                line-height: 1.4;
                letter-spacing: 0.1rem;
                text-transform: uppercase;
                font-weight: 700;
            }

            .month li.prev,
            .month li.next{
                cursor: pointer;
            }

            .month li.prev{
                float: left;
            }

            .month li.next{
                float: right;
            }

            .month li{
                font-size: 1.2rem;
                font-weight: 400;
            }

            /* дни недели */
            .weekdays{
                margin: 0;
                padding: 1rem 0;
                background-color:#CDE3CF ;
                width: 100%;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: left;
                color: #ffffff;
            }

            .weekdays li{
                display: inline-block;
                flex: 0 0 calc(100% / 7);
                text-align: center;
            }

            /* дни */
            .days{
                text-decoration: none;
                margin: 0;
                padding: 1rem 0;
                background-color: #EEF6EF;
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: left;
                align-content: flex-start;
                height: 14rem;
            }

            .days li{
                font-size: xx-small;

                display: flex;
                flex-direction: column;

                flex-wrap: wrap;
                justify-content: space-between;;
                text-decoration: none;
                flex: 0 0 calc(100% / 7);

            }

            .days li.date-now{
                color: #000;
                font-weight: 700;
            }
            .buttona{
                font-size: 15px !important;
                width:82%;
                justify-self: flex-end;
                color: #fff;
                background: #222A23;

                font-weight: bold;
                outline: none;
                border: none;
                border-radius: 5px;
                transition: .2s ease-in;
                cursor: pointer;
            }

            .buttona:hover{
                background: #C5DFC7;
            }
            .currentDay{
                background: cadetblue;
            }
            .currentDay::before{
                content: "› ";
                animation: 2s linear infinite condemned_blink_effect;
            }
            .rupture{color:tomato}

            .almostrupture{}
            .bonstock{}
            @keyframes condemned_blink_effect {
                0% {
                    visibility: hidden;
                }
                50% {
                    visibility: hidden;
                }
                100% {
                    visibility: visible;
                }
            }
        </style>

            <div id="month-calendar">
                <?php $carbonDate = \Carbon\Carbon::parse($day) ?>
                <ul class="month">
                    <li wire:click="prevv('{{$carbonDate->locale('fr')}}')" class="prev"><i class="fas fa-angle-double-left"></i></li>
                    <li wire:click="nextt('{{$carbonDate->locale('fr')}}')" class="next"><i class="fas fa-angle-double-right"></i></li>
                    <div style="display: flex;justify-content: center;gap:1em">
                        <li class="day-name">{{$carbonDate->locale('fr')->day}}</li>
                        <li class="month-name">{{$carbonDate->locale('fr')->monthName}}</li>
                        <li class="year-name">{{$carbonDate->locale('fr')->year}}</li>
                    </div>


                </ul>
                <ul class="weekdays">

                    <li @if(\Carbon\Carbon::now()->dayOfYear === $carbonDate->dayOfYear)
                            class="currentDay"
                    @endif>
                        {{$carbonDate->dayName}} {{$carbonDate->day}} {{$carbonDate->shortMonthName}}
                    </li>
                    @for ($i = 0; $i < 6; $i++)

                        <li>
                            {{$carbonDate->addDays(1)->dayName}} {{$carbonDate->day}} {{$carbonDate->shortMonthName}}
                        </li>

                    @endfor
                    <?php $carbonDate->addDays(-6); ?>


                </ul>

                <ul class="days">




                    @for ($i = 0; $i < 7; $i++)

                     <li style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">

                    <div>
                        <livewire:calendar.list-repas-for-day :day="$carbonDate" :wire:key="$i.now().$carbonDate"/>
                        <livewire:calendar.data-for-day :day="$carbonDate" :wire:key="$i.now().$carbonDate"/>

                    </div>
                        @if($buttonVisible == $carbonDate->dayOfYear)

                            <livewire:calendar.make-repas-for-day :day="$carbonDate" :wire:key="$i.now().$carbonDate"/>

                        @endif
                    <div style="width:100%;display:flex;flex-direction: row;justify-content:center">
                        <button class="myButton" style="width:80%"  :wire:key="$i.now().$carbonDate->dayOfYear" wire:click="showAddButtonForDay('{{$carbonDate->dayOfYear}}')" >
                            <i class="fa-duotone fa-plus" ></i> repas
                        </button>

{{--                      <button class="myButton"  :wire:key="$i.now().$carbonDate->dayOfYear" wire:click="addselection('{{$carbonDate->toDateString()}}')" >
                        <i class="fa-solid fa-basket-shopping"></i> courses
                    </button> --}}

                    </div>

                    </li>
                    <?php $carbonDate->addDays(1); ?>
                    @endfor
                    <?php $carbonDate->addDays(-7); ?>

                </ul>
            </div>








            <div id="month-calendar">

            <div class="days" style="width:100%;display:flex;justify-content: space-around">




                @for ($i = 0; $i < 7; $i++)

                <li style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                <div>

                    <livewire:calendar.courses-for-day :day="$carbonDate" :wire:key="$i.now().$carbonDate"/>

               </div>




               </li>

               <?php $carbonDate->addDays(1); ?>
               @endfor
            </div>








            </div>



















{{--
            <div style="margin-top:10px;display:flex;flex-direction:column">
                @if ($listedecourses)
                <button wire:click="CreateCourseAll()" class="myButton"> Tout ajouter<i class="fa-regular fa-square-plus"  style="cursor: grab;color:red;font-size: 10px"></i></button>

                @endif
                @forelse ($listedecourses as $name=>$quantity)
                <div style="width:100;display:flex;margin-top:10px;justify-content:space-between"">

                        <span>{{$name}} -> {{$quantity['quantity']}} {{$quantity['unit']}}</span>
                        <button class="myButton">
                            <i class="fa-regular fa-square-plus" wire:click="" style="cursor: grab;color:red;font-size: 10px"></i>
                         </button>


                </div>

                @empty

                @endforelse




                  @if ($stats)
                    &#9632;  Stats :
                    <ul>

                        @foreach ($stats as $stat=>$data)
                                <li style="color:cornflowerblue" >{{$stat}} : {{$data['value']}} {{$data['unit']}} </li>
                            @endforeach
                        </ul>
                    @endif


                    @if ($MissingInventory)
                    <span style="color:tomato">&#9632;  Missing Inventory !</span>
                    <ul>

                       @forelse ($MissingInventory as $name=>$quantity)
                            <li style="color:tomato" >{{$name}} -> {{$quantity['quantity']}} {{$quantity['unit']}} </li>

                        @empty
                        @endforelse

                    </ul>
                    @endif


               </div> --}}



    </div>

