

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script
        src="https://kit.fontawesome.com/f824352320.js"
        crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>


    @livewireStyles
</head>
<body>
<div class="container">

    <div class="Header backcolor">
        <div class="form_dates">
            <label for="from_date">From</label>
            <input type="date" name="from_date" id="from_date" />
            <label for="to_date">To</label>
            <input type="date" name="to_date" id="to_date" />
            <div class="icone"><i class="fa-solid fa-arrows-rotate"></i></div>
        </div>
    </div>




    @include('template.header')

    @include('template.first')

    @include('template.left')

    <div  class="second-data backcolor"  >
        <livewire:recettes-table />
    </div>

</div>
</body>
@livewireScripts


</html>

