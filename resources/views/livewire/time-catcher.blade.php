
    <div class="row p-0">
        <div class="card ms-3 p-0 col" style="">
            <div class="card-header text-center">
                {{$theme[0]->theme_name}}
                <button class="btn btn-secondary {{$btnStatus1}}" wire:click='StartTimer'>Start zegarów</button>
                <button class="btn btn-secondary {{$btnStatus2}}" wire:click='StopTimer'>Stop zegarów</button>
                <button class="btn btn-secondary {{$btnStatus3}}" wire:click='SaveToFile'>Zapisz pomiar</button>
                <button class="btn btn-secondary {{$btnStatus4}}" wire:click='ClearTimers'>Wyczyść zegary</button>
                <button class="btn btn-secondary" wire:click='ShowTimers'>Pokaz pomiary</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr class="card-header">
                        <th class="text-center" scope="col">Nr operacji</th>
                        <th class="text-center"scope="col">Nazwa operacji</th>
                        <th class="text-center" scope="col">Uwagi do pomiaru</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($theme as $item)
                      <tr>
                        <td class="col-1 text-center">
                            {{$item->action_id}}</td>
                        <td class="col-sm-5">
                            <button class="btn btn-secondary col-12" wire:click="CheckPointTime('{{$item->action_name}}')">
                                {{$item->action_name}}
                            </button>
                        </td>
                        <td>
                            @if($btnStatus1=='disabled')
                                @forelse ($timers as $key => $value)
                                    @foreach ($timers[$key]['checkpoints'][$item->action_name] as $key => $value)
                                        {{$value}}
                                    @endforeach
                                    
                                @empty
                                    <td>Nie ma zadnych czynności</td>
                                @endforelse
                            @endif
                        </td>
                            
                        @empty
                            <td>Nie ma zadnych czynności</td>
                        @endforelse
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="card ms-1 p-0 col col-md-3" style="">
            <div class="card-header text-center">
                Ustawienia
            </div>
            <div class="conteiner text-center">
                <div class="row my-3">
                   <span class="text-center">
                       Dodaj zegar
                    </span>
                </div>
                <div class="btn-group">
                    <button class="btn btn-secondary {{$btnDecrease}}" wire:click.prevent='decrease' style="width:35px">-</button>

                    <input type="text" class="form-control text-center" style="width:60px" readonly value="{{$no_persons}}">

                    <button class="btn btn-secondary {{$btnIncrease}}" wire:click.prevent='increase' style="width:35px">+</button>
                </div>
                    @if($no_persons>0)
                        @foreach ($timers as $key => $value)
                            <div class="row my-2 px-4">
                                <button type="button" class="btn btn-sm btn-outline-success {{$this->timers[$key]['status']}}" wire:click="ClockSelector('{{$key}}')">{{$key}}</button>
                            </div>
                        @endforeach
                    @endif
            </div>
            @if (session('start-ok'))
            <div class="alert text-center alert-success mx-2 my-2">
                {{ session('start-ok') }}
            </div>
            @endif
            @if(session('start-nok'))
                <div class="alert text-center alert-warning mx-2 my-2">
                    {{ session('start-nok') }}
                </div>
            @endif
        </div>
    </div>

