<div class="mx-2 overflow-hidden text-center">
    <div class="position-relative my-4 p-2">        
        <button wire:click="Add()" type="button" class="position-absolute top-10 end-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 10rem; height:2rem;">Dodaj komponent</button>
      </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Lista wydziałów</h5>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Wydział</th>
                        <th scope="col">Komórka produkcyjna</th>
                        <th scope="col">Nazwa Komponentu</th>
                        <th scope="col">Czas badania</th>
                        <th scope="col">Edytuj</th>
                        <th scope="col">Usuń</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($components as $item)                        
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->Department->department_name}}</td>
                        <td>{{$item->Cell->cell_name}}</td>
                        <td>{{$item->component_name}}</td>
                        <td>{{$item->duration}}</td>
                        <td><button class="btn btn-outline-secondary" wire:click='ShowUpdateModal({{$item->id}})'><i class="bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-outline-secondary" wire:click='DeleteModal({{$item->id}})'><i class="bi-trash3"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="form" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="Store()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5"s>Dodaj Nowy Komponent</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control my-2" id="componentName" wire:model.defer="name" placeholder="Nazwa komponentu">
                        <div class="text-danger mb-2">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <select class="form-select" aria-label="Default select example" wire:click='GetCells' wire:model.live='department_id'>
                            <option selected>Wybierz z listy wydział do którego nalezy komponent.</option>
                            @foreach ($departments as $item)                            
                                <option value="{{$item->id}}">{{$item->department_name}}</option>
                                <h1>{{$item->department_name}}</h1>
                            @endforeach
                        </select>
                        <div class="text-danger mb-2">
                            @error('department_id') {{ $message }} @enderror
                        </div>
                        <select class="form-select" aria-label="Default select example" wire:model.change='cell_id'>
                            <option selected>Wybierz z listy komórkę produkcyjną.</option>
                            @foreach ($cells as $item)                            
                                <option value="{{$item->id}}">{{$item->cell_name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mb-2">
                            @error('cell_id') {{ $message }} @enderror
                        </div>
                        <input type="text" class="form-control my-2" id="componentDuration" wire:model.defer="duration" placeholder="Czas badania">
                        <div class="text-danger mb-2">
                            @error('duration') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="update" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog draggable">
            <form wire:submit.prevent="Update">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Podaj nową nazwę komponentu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <label for="componentName">Nazwa komponentu</label>
                        <input type="text" class="form-control mb-2" id="componentName" wire:model.defer="name">
                        <div class="text-danger mb-2">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <label for="department">Wydział</label>
                        <select class="form-select mb-2" id="department" aria-label="Default select example" wire:click='GetCells' wire:model.change='department_id'>
                            <option>{{$department_name}}</option>
                            @foreach ($departments as $item)                            
                                <option value="{{$item->id}}">{{$item->department_name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mb-2">
                            @error('department_id') {{ $message }} @enderror
                        </div>
                        <select class="form-select" aria-label="Default select example" wire:model.change='cell_id'>                           
                            @foreach ($cells as $item)
                                @if ($item->id == $cell_id)
                                    <option selected value="{{$item->id}}">{{$item->cell_name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->cell_name}}</option>
                                @endif                            
                            @endforeach
                        </select>
                        <div class="text-danger mb-2">
                            @error('cell_id') {{ $message }} @enderror
                        </div>
                        <label for="componentDuration">Czas badania</label>
                        <input type="text" class="form-control mb-2" id="componentDuration" wire:model.defer="duration">
                        <div class="text-danger mb-2">
                            @error('duration') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Uaktualnij</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="delete" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog draggable">
            <form wire:submit.prevent="Delete">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Usuwanie komponentu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Czy na pewno chcesz usunąć ten komponent ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Usuń</button>
                    </div>
                </div>
            </form>
        </div>
    </div>      
</div>
