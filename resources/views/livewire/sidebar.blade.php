    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100">

      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item h5">
          <a href="{{route('home')}}" class="nav-link text-white" aria-current="page">
            <i class="bi-house"></i>
            Home
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('themes')}}" class="nav-link text-white">
            <i class="bi-card-checklist"></i>
            Szablony
          </a>
        </li>
        <li class="nav-item h5">
          <a href="#" class="nav-link text-white">
            <i class="bi-clipboard2-data"></i>
            Raporty
          </a>
        </li>
        <li class="nav-item h5">
          <a href="#" class="nav-link text-white">
            <i class="bi-alarm"></i>
            Produkty
          </a>
        </li>
        <li class="nav-item h5">
          <a href="#" class="nav-link text-white">
            <i class="bi-grid"></i>
            Ustawienia
          </a>
        </li>
        <hr>
      </ul>
      <h5>
        
        Czas :{{$current_time}}
      </h5>
    </div>
  
