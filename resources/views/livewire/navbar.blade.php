<div>
    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm sticky-top main-div" style="height:50px">

        <button class="btn btn-dark text-bg-dark mx-4 btn-md" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/home2') }}">
                {{ config('app.name', 'Time Catcher') }}
            </a>      
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <li class="nav-item dropdown">
                <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj') }}</a>
                        </li>
                    </ul>
                </div>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
    
    
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                            </li>
                        @endif
    
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
                            </li>
                        @endif
                    @else
                        
                    @endguest
                </ul>
            </div>
            <button type="button" class="btn btn-dark position-relative" wire:click='Add'>
                Nieprzyjęte zlecenia
                <span class="position-absolute mt-1 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{$numberOfNotAccepted}}+
                  <span class="visually-hidden">unread messages</span>
                </span>
            </button>
            <span style="color: azure" id="demo" class="nav-link  fs-5 mx-4"></span>
    </nav>
    <div wire:ignore.self class="modal fade" id="acceptTaskModal" tabindex="-1" aria-labelledby="acceptTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: fit-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="acceptTaskModalLabel">Nieprzyjęte zlecenia</h1>
                    <button type="button" class="btn-close" wire:click="showexample" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($notAccepted)>0)                        
                        @foreach ($notAccepted as $item)                            
                            <div class="container text-center">
                                <div class="row row-cols-auto mb-2 align-items-center">
                                    <div class="col">{{$item->Cell->cell_name}}</div>
                                    <div class="col">{{$item->Component->component_name}}</div>
                                    <div class="col">{{$item->component_number}}</div>
                                    <div class="col"><button type="button"  wire:click='accept({{$item->id}})' class="btn btn-outline-secondary btn-sm">Przyjmij zlecenie</button></div>
                                </div>
                            </div>    
                        @endforeach
                    @else
                        <div class="container text-center">
                            <span>Brak nieprzyjętych zleceń</span>
                        </div>  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setInterval(myTimer, 100);
        const days = ["Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota"];
        const months = ["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"];
        function myTimer() {
            const d = new Date();

            let day = days[d.getDay()];
            let month = months[d.getMonth()];

            document.getElementById("demo").innerHTML = day + ', '+ d.getDate() + ' ' + month + ' '+ d.toLocaleTimeString() ;
        }
</script>