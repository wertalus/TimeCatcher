<div class="mx-2 overflow-hidden text-center">
    <div class=" my-2 position-relative" role="group" aria-label="Basic example" style="height: 40px">
        <div class="position-absolute top-0 end-0">
            <button wire:click="Add()" type="button" class="btn btn-sm btn-secondary rounded-pill end" style="width: 10rem; height:2rem;">Dodaj komponent</button>
        </div>
        <div class="position-absolute top-0" style="left: 35%">
            <input class="form-control" id="myInput" type="text" placeholder="Wyszukaj..." style="width: 30rem">
        </div>
    </div>

    <div class="card" style="min-height:  calc(100vh - 180px)">
        <div class="card-body p-0 table-responsive">
            <h5 class="card-header text-center">Lista wydziałów</h5>
            <table class="table table-hover" id="ToDoTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Komórka produkcyjna</th>
                        <th scope="col">Nazwa Komponentu</th>
                        <th scope="col">Nr Komponentu</th>
                        <th scope="col">Czas badania</th>
                        <th scope="col">Godzina gotowości</th>
                        <th scope="col">Godzina przybycia</th>
                        <th scope="col">Status badania</th>
                        <th scope="col">Badacz</th>
                        <th scope="col">Edytuj</th>
                        <th scope="col">Usuń</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $item)                        
                    <tr class="align-middle">
                        <td>
                            <span class="btn badge rounded-pill text-bg-primary">{{$item->id}}</span>
                        </td>
                        <td>{{$item->Cell->cell_name}}</td>
                        <td>{{$item->Component->component_name}}</td>
                        <td>{{$item->component_number}}</td>
                        <td>{{$item->Component->duration}}</td>
                        <td class="text-wrap">{{$item->start}}</td>
                        <td style="overflow-wrap:break-word">{{$item->start}}</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                    @foreach ($status as $item2)
                                        @if ($item->status_id == $item2->id)
                                            <option value="{{$item->status_id}}" selected>{{$item->Status->status_name}}</option>
                                        @else
                                            <option value="{{$item2->id}}">{{$item2->status_name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </td>
                        <td> {{$item->QC->name}} </td>
                        <td><button class="btn btn-outline-secondary" wire:click='ShowUpdateModal({{$item->id}})'><i class="bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-outline-secondary" wire:click='DeleteModal({{$item->id}})'><i class="bi-trash3"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
