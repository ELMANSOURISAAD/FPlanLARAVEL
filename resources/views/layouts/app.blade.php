<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script
        src="https://kit.fontawesome.com/f824352320.js"
        crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @livewireStyles
</head>
<body>
<div class="container">



    {{ $slot }}





</div>
@livewireScripts
</body>
