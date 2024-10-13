<div class="mx-2 overflow-hidden text-center">
    <div class="position-relative my-4 p-2">        
        <button wire:click="Add()" type="button" class="position-absolute top-10 end-0 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 10rem; height:2rem;">Dodaj wydział</button>
      </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Lista wydziałów</h5>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa Wydziału</th>
                        <th scope="col">Edytuj</th>
                        <th scope="col">Usuń</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $item)                        
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->department_name}}</td>
                        <td><button class="btn btn-outline-secondary" wire:click='ShowUpdateModal({{$item->id}})'><i class="bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-outline-secondary" wire:click='Delete({{$item->id}})'><i class="bi-trash3"></i></button></td>
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
                        <h1 class="modal-title fs-5">Podaj nazwę wydziału</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="DepartmentName" wire:model.defer="name">
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
    <div class="modal fade" id="update" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="Update">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Podaj nową nazwę wydziału</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="DepartmentName" wire:model.defer="update_name" value="">
                        <div>
                            @error('theme_name') {{ $message }} @enderror
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

