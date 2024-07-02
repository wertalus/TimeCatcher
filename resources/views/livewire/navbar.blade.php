<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm sticky-top" style="height:50px">
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
        <div class="dropdown">
            <button type="button" style="color: azure" class="btn position-relative nav-link mx-4" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                Nieprzyjęte zlecenia
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{$numberOfNotAccepted}}+
                  <span class="visually-hidden">unread messages</span>
                </span>
            </button>
            <form class="dropdown-menu p-2" style="width:400px">
                <div class="mb-3">
                    @foreach ($notAccepted as $item)
                    <div class="row g-3">
                        <div class="col-auto">
                          <input type="password" class="form-control" disabled id="inputPassword2" placeholder="{{$item->title}}">
                        </div>
                        <div class="col-auto">
                          <button class="btn btn-primary mb-3 form-control">Przyjmij zlecenie</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
    <span style="color: azure" id="demo" class="nav-link  fs-5 mx-4"></span>
</nav>
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