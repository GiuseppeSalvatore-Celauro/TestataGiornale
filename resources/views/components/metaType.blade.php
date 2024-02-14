<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Quantità articoli collegati a questo tag</th>
        <th scope="col">Aggiorna</th>
        @if ($metaData == 'tags')
        <th scope="col">Cancella</th>
        @endif
      </tr>
    </thead>
    <tbody>
    @foreach ($metaType as $metaTipo)
        <tr>
            <th scope="row">{{$metaTipo->id}}</th>
            <td>{{$metaTipo->name}}</td>
            <td>{{$metaTipo->articles->where('is_accepted', true)->count()}}</td>
            @if ($metaData == 'tags')
                <td>
                    <form action="{{route('aggiornamento.tags', ['tag'=> $metaTipo])}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" placeholder="Nome nuovo tag" name="name" class="">
                        <button type="submit" class="btn btn-primary">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('elimina.tags', ['tag'=> $metaTipo])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina tag</button>
                    </form>
                </td>
            @elseif($metaData == 'category')
                <td>
                    <form action="{{route('aggiornamento.cat', ['category'=> $metaTipo])}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" placeholder="Nome nuovo tag" name="name" class="">
                        <button type="submit" class="btn btn-primary">Aggiorna</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>