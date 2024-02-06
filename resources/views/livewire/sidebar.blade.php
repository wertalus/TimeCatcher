    <div class=" sidenav d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:90">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sidebar</span>
      </a>
      <hr>
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
  
