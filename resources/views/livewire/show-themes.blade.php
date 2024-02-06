
<div class="card my-4 mx-5 ">
    <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Nr szablonu</th>
            <th scope="col">Nazwa szablonu</th>
            <th scope="col">Opcje</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($themes as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->theme_name}}</td>
              <td>
                <button class="btn btn-danger">Usuń</button>
                <button wire:click="EditTheme('{{$item->theme_name}}')" class="btn btn-secondary">Edytuj</button>
                <a href="{{route('counter',['id'=>$item->id])}}" class="btn btn-info">Wybierz</a>
              </td>
          @empty
              <td>Nie ma zadnych szablonów</td>
          @endforelse
          </tr>
        </tbody>
    </table>
</div>

