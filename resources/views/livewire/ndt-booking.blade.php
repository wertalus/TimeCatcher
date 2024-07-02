<div>
  <div class="container overflow-hidden text-center">
    <div class="row gy-5">
      @foreach ($departments as $item)          
      <div class="col-2">
        <div class="card">
          <div class="card-header">
            {{$item->department_name}}
          </div>
          <div class="card-body">
            <button wire:click="ShowModal" class="btn btn-primary">Dodaj rezerwację</a>
          </div>
        </div>
      </div>
      @endforeach  
    </div>
  </div>
  <div class="modal fade" id="form" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form wire:submit.prevent="AddNewEvent()">
        <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="form">Rezerwacja badań NDT</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          @if (session('date'))
              <div class="alert alert-danger mx-2 mt-2">
                  {{ session('date') }}
              </div>
          @endif
          <div class="modal-body">
            <select class="form-select mb-2" aria-label="Default select example" wire:click="GetComponents()" wire:model.change='department_id'>
              <option>Wybierz komórkę produkcyjną</option>
              @foreach ($departments as $item)                            
                  <option value="{{$item->id}}">{{$item->department_name}}</option>
              @endforeach
            </select>
            @if (count($components)==0)
                  
            @else                            
              <select class="form-select my-2" aria-label="Default select example" wire:model.change='component_id'>
                <option>Wybierz komponent</option>
                  @foreach ($components as $item)                            
                    <option value="{{$item->id}}">{{$item->component_name}}</option>
                  @endforeach
              </select>
              <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Poprawny format numeru ramy 1234/1" wire:model.blur='component_pattern_number' aria-label="Username">
              </div>
              <div class="text-danger mb-2">
                @error('component_pattern_number') {{ $message }} @enderror
              </div>
            @endif
            <input type="date" class="form-control mb-2" wire:model.defer='date'>
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Godzina</label>
              <select class="form-select" id="inputGroupSelect01" wire:model.change = 'hours'>
                @for ($i = 1; $i <= 24; $i++)
                  @if ($i<10)
                    <option value="{{$i}}">0{{$i}}</option>
                  @else
                    <option value="{{$i}}">{{$i}}</option>
                  @endif                                
                @endfor
              </select>
              <label class="input-group-text" for="inputGroupSelect01">Minuty</label>
              <select class="form-select" id="inputGroupSelect01" wire:model.change='minutes'>
                <option value="00">00</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="45">45</option>
              </select>
            </div>
            <input type="time" id="appt" class="form-control" wire:model.defer='time'>
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
      
