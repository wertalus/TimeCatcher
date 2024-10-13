<div class="d-flex flex-column flex-shrink-0 p-3">
  <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header" data-bs-theme="dark">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-theme="dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item h5">
          <a href="{{route('home2')}}" class="nav-link text-white" aria-current="page">
            <i class="bi-house"></i>
            Home
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('NDT')}}" class="nav-link text-white">
            <i class="bi-card-checklist"></i>
            Rezerwacje badań
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('add_new_department')}}" class="nav-link text-white">
            <i class="bi-clipboard2-data"></i>
            Dodaj wydział
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('add_new_component')}}" class="nav-link text-white">
            <i class="bi-alarm"></i>
            Dodaj nowe komponenty
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('add_new_cell')}}" class="nav-link text-white">
            <i class="bi-alarm"></i>
            Dodaj nową komórkę produkcyjną
          </a>
        </li>
        <li class="nav-item h5">
          <a href="{{route('calendar')}}" class="nav-link text-white">
            <i class="bi-grid"></i>
            Kalendarz badań
          </a>
        </li>      
        <li class="nav-item h5">
          <a href="{{route('todo')}}" class="nav-link text-white">
            <i class="bi-grid"></i>
            Lista rezerwacji
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
    </div>
  </div>
</div>