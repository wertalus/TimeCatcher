<div class='container'>
    
        <div class="card mx-auto" style="">
            <div class="card-header">
                {{$theme_name}}
            </div>
            <form class="card-body row g-3 d-flex justify-content-evenly" autocomplete="off" wire:submit.prevent='AddTask'>
                <div class="col-auto text-align-middle">
                    <label for="action_id" class="form-label mt-2">ID czynności:</label>
                </div>
                <div class="col-1">
                    <input wire:model='action_id' wire:keydown.enter='AddTask' type="text" class="form-control" id="action_id">
                </div>
                <div class="col-auto">
                    <label for="action_name" class="form-label mt-2">Nazwa czynności:</label>
                </div>
                <div class="col-6">
                  <input wire:model='action_name' wire:keydown.enter='AddTask' type="text" class="form-control" id="action_name">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Dodaj do listy {{$theme_list_id}}</button>
                </div>
                <div class="text-danger">@error('task_name') {{ $message }} @enderror</div>
            </form> 
        </div>
        <div class="card my-4 ">
            <table class="table text-center">
                <thead>
                  <tr class="card-header">
                    <th class="col-1" scope="col">Nr operacji</th>
                    <th scope="col">Nazwa operacji</th>
                    <th class="col-3" scope="col-">Opcje</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($theme as $item)
                  <tr>
                    <td>{{$item->action_id}}</td>
                    <td>{{$item->action_name}}</td>
                    <td class="d-flex justify-content-between">
                        <button class="btn btn-danger">Usuń</button>
                        <button wire:click.prevent='EditTask({{$item}})' class="btn btn-secondary">Edytuj</button>
                    </td>
                    @empty
                        <td>Nie ma zadnych czynności</td>
                    @endforelse
                  </tr>
                </tbody>
              </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="form" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form wire:submit.prevent="SaveTask()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="form">Podaj nową nazwę operacji</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="action_id" wire:model.defer='state.action_id'>
                            <input type="text" class="form-control" id="themeName" wire:model.defer="state.action_name">
                            <div>
                                @error('theme_name') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                            <button type="submit" class="btn btn-primary">Zapisz zmianę</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<script type="text/javascript"> 
    window.onbeforeunload = function() {
        console.log("Message");
        return "If you exit this page you will lose your data!";
    }
</script>

