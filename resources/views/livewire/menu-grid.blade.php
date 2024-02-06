<div class="row ms-2">
    <div class="col-sm-5 mb-3 mb-sm-0 grid-card">
        <div class="card bg-warning-subtle">
            <div class="card-body d-flex flex-column text-center">
                <h5 class="card-title">Tworzenie nowego szablonu</h5>
                <p class="card-text">Utwórz nowy szablon dodając czynności, zegary, osoby.</p>
                <button class="btn btn-secondary mt-auto" wire:click.prevent="AddNew">Nowy szablon</button>
            </div>
        </div>
    </div>
    <div class="col-sm-5 grid-card">
        <div class="card bg-warning-subtle">
            <div class="card-body d-flex flex-column text-center">
                <h5 class="card-title">Gotowe szablony</h5>
                <p class="card-text">Wykorzystaj szablony z poprzednich pomiarów.</p>
                <a href="{{route('theme-list')}}" class="btn btn-secondary mt-auto">Przeglądaj</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="form" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="CreateTheme">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="form">Podaj tytuł szablonu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="themeName" wire:model.blur="theme_name">
                        <div class="text-danger">
                            @error('theme_name') {{ $message }} @enderror
                            {{ session('message') }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-primary">Przejdź do tworzenia szablonu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
