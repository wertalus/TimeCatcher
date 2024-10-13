<div class="mx-2 overflow-hidden text-center">
    <div class=" my-2 position-relative" role="group" aria-label="Basic example" style="height: 40px">
        <div class="position-absolute top-0 end-0">
            <button wire:click="Add()" type="button" class="btn btn-sm btn-secondary rounded-pill end" style="width: 10rem; height:2rem;">Dodaj komponent</button>
        </div>
        <div class="position-absolute top-0" style="left: 35%">
            <input class="form-control" id="myInput" type="text" placeholder="Wyszukaj..." style="width: 30rem">
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0 table-responsive">
            <h5 class="card-header text-center">Lista wydziałów</h5>
            <table class="table table-hover" id="ToDoTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Komórka produkcyjna</th>
                        <th scope="col">Nazwa Komponentu</th>
                        <th scope="col">Nr Komponentu</th>
                        <th scope="col">Data i godzina gotowości</th>
                        <th scope="col">Data i godzina przybycia badacza</th>
                        <th scope="col">Status badania</th>
                        <th scope="col">Badacz</th>
                        <th scope="col">Edytuj</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $item)                        
                    <tr class="align-middle" wire:click='ShowUpdateModal({{$item->id}})'>
                        <td>
                            <span class="btn badge rounded-pill text-bg-primary">{{$item->id}}</span>
                        </td>
                        <td>{{$item->Cell->cell_name}}</td>
                        <td>{{$item->Component->component_name}}</td>
                        <td>{{$item->component_number}}</td>
                        <td>
                                <p class="m-0">
                                    {{Carbon\Carbon::parse($item->start)->toDateString()}}
                                </p>
                                <p class="m-0">
                                    {{Carbon\Carbon::parse($item->start)->format('H:i')}}
                                </p>
                        </td>
                        <td>
                            <p class="m-0">
                                {{Carbon\Carbon::parse($item->start)->toDateString()}}
                            </p>
                            <p class="m-0">
                                {{Carbon\Carbon::parse($item->start)->format('H:i')}}
                            </p>
                        </td>
                        <td>
                            <span class="rounded-pill p-2" style="background: {{$item->Status->color_value}}; height:60px">
                                {{$item->Status->status_name}}
                            </span> 
                        </td>
                        <td> {{$item->QC->name}} </td>
                        <td><button class="btn btn-outline-secondary" wire:click='ShowUpdateModal({{$item->id}})'><i class="bi-pencil-square"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="update" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="Store()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="form">Rezerwacja nr: {{$id}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px" id="basic-addon1">Utworzył : </span>
                            <input type="text" class="form-control" disabled value="{{$created_by}}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Data i czas : </span>
                            <input type="text" class="form-control" disabled value="{{$created_at}}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>                          
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Komórka produkcyjna : </span>
                            <input type="text" class="form-control" disabled value="{{$cell}}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>                          
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Nazwa komponentu : </span>
                            <input type="text" class="form-control" disabled value="{{$component}}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>                          
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Data i godzina gotowości : </span>
                            <input type="text" class="form-control" disabled value="{{$ready_date}}" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Data i godzina gotowości : </span>
                            <select class="form-select form-control" id="inputGroupSelect01" wire:model.change = 'hours'>
                              @for ($i = 1; $i <= 24; $i++)
                                @if ($i<10)
                                  <option value="{{$i}}">0{{$i}}</option>
                                @else
                                  <option value="{{$i}}">{{$i}}</option>
                                @endif                                
                              @endfor
                            </select>
                            <select class="form-select form-control" id="inputGroupSelect01" wire:model.change='minutes'>
                              <option  value="00">00</option>
                              <option  value="15">15</option>
                              <option  value="30">30</option>
                              <option  value="45">45</option>
                            </select>
                            <input type="date" class="form-control" style="width: 120px" wire:model.defer='date'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="width:190px">Status badania : </span>
                            <select class="form-select form-control" id="inputGroupSelect01" wire:model.change = 'current_status'>
                                @foreach ($status as $status)
                                    @if ($status->status_name == $current_status)
                                        <option selected value="{{$status->status_name}}">{{$status->status_name}}</option>
                                    @else
                                        <option value="{{$status->status_name}}">{{$status->status_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                              @error('theme_name') {{ $message }} @enderror
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
</div>
