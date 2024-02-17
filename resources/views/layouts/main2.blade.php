<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Time Catcher') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <!--@vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- @vite(['resources/css/sidebars.css', 'resources/js/sidebars.js'])-->
    
    <link rel="text" href="{{ asset('css/sidebars.css') }}"> 

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <div id="app">
        <livewire:navbar/>
        <livewire:sidebar/>
        <main class="py-4">    
            {{$slot}}
        </main>
        <livewire:footer/>
    </div>
    @if(Session::has('message'))
    <script>

        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            "positionClass": "toast-bottom-right"
        }
                toastr.success("{{ session('message') }}");
    </script>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidebars.js') }}"></script>
</body>
<livewire:scripts>
    <script>
        
        window.addEventListener('show-form', event =>{
            $('#form').modal('show');
        })
        window.addEventListener('hide-form', event =>{
            $('#form').modal('hide');
        })
    </script>
</html>
