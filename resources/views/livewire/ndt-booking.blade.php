<div>
  <div class="container overflow-hidden text-center">
    <div class="row gy-5">
        <div class="col-2">
          <div class="card">
            <div class="card-header">
              PBW
            </div>
            <div class="card-body">
              <h5 class="card-title">Nowe Wagony</h5>
              <button wire:click="ShowModal" class="btn btn-primary">Dodaj rezerwację</a>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="card">
            <div class="card-header">
              Pomiary
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="card">
            <div class="card-header">
              Badania NDT
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="card">
            <div class="card-header">
              Badania NDT
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="modal fade" id="form" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="Store()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="form">Rezerwacja badań NDT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="DepartmentName" wire:model.defer="name">
                        <select class="form-select" aria-label="Default select example" wire:model.change='department_id'>
                          <option>Wybierz wydział</option>
                          @foreach ($departments as $item)                            
                              <option value="{{$item->id}}">{{$item->department_name}}</option>
                          @endforeach
                        </select>
                        <select class="form-select" aria-label="Default select example" wire:model.change='department_id'>
                          <option>Wybierz wydział</option>
                          @foreach ($components as $item)                            
                              <option value="{{$item->id}}">{{$item->component_name}}</option>
                          @endforeach
                        </select>
                        <div>
                            @error('theme_name') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Dodaj rezerwację</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
      
