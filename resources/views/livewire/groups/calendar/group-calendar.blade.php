
<td colspan="3">

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
                <livewire:groups.calendar.list-repas-for-day :day="$carbonDate" :group="$group" :wire:key="$i.now().$carbonDate"/>
                <livewire:groups.calendar.data-for-day :day="$carbonDate" :group="$group" :wire:key="$i.now().$carbonDate"/>

            </div>
                @if($buttonVisible == $carbonDate->dayOfYear)
                <div>
                    <livewire:groups.calendar.make-repas-for-day :day="$carbonDate" :group="$group" :wire:key="$i.now().$carbonDate"/>
                </div>
                @endif
            <div style="width:100%;display:flex;flex-direction: row;justify-content:center">
                <button class="myButton" style="width:80%"   wire:click="showAddButtonForDay('{{$carbonDate->dayOfYear}}')" >
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

            <livewire:groups.calendar.courses-for-day :day="$carbonDate" :group="$group" :wire:key="$i.now().$carbonDate"/>

       </div>




       </li>

       <?php $carbonDate->addDays(1); ?>
       @endfor
    </div>








    </div>




</td>
