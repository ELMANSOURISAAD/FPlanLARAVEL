<div class="container">
<livewire:template.header/>
    <livewire:template.leftbar/>
        <livewire:template.rightbar/>
            <livewire:calendar.calendartable :day="$day" :wire:key="now().$day" />
</div>


