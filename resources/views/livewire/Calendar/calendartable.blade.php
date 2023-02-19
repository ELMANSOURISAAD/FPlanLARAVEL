
    <div class="main-wrapper first-data backcolor">
        <style>
            .container {
                width:100%;
                margin: 50px;
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-template-rows: repeat(10, 1fr);
                gap: 30px;
                grid-auto-flow: row;
                grid-template-areas:
    "left Header Header Header Header"
    "left Header Header Header Header"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data";
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
                background: #96A998;
                text-align: center;

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
                font-size: 13px;
                text-align: justify;

                display: flex;
                flex-direction: column;
                align-content: center;
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
                <?php $carbonDate = \Carbon\Carbon::parse($carbonDate) ?>
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

                        <li style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
                            <livewire:calendar.list-repas-for-day :day="$carbonDate" :key="time().$carbonDate"/>

                            @if($buttonVisible == $carbonDate->dayOfYear)
                                <livewire:calendar.make-repas-for-day :day="$carbonDate" :key="time().$carbonDate"/>
                            @endif
                            <button class="buttona"  wire:click="showAddButtonForDay('{{$carbonDate->dayOfYear}}')" >
                                <i class="fa-duotone fa-plus" ></i>
                            </button>





                        </li>

                    @for ($i = 0; $i < 6; $i++)
                        <li>
                            <livewire:calendar.list-repas-for-day :day="$carbonDate->addDays(1)" :key="time().$carbonDate"/>
                            @if($buttonVisible == $carbonDate->dayOfYear)
                                <livewire:calendar.make-repas-for-day :day="$carbonDate" :key="time().$carbonDate"/>
                            @endif
                            <button class="buttona"  wire:click="showAddButtonForDay('{{$carbonDate->dayOfYear}}')" ><i class="fa-duotone fa-plus" ></i></button>

                        </li>
                    @endfor

                </ul>
            </div>
        <div style="width:100%;display:flex;justify-content: space-around">
            <div>LEFT</div>
            <div> MIDDLE </div>
            <div>RIGHT</div>
        </div>



    </div>

