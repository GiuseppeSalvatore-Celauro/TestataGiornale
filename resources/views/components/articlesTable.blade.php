<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Chi lo ha scritto</th>
        <th scope="col">Categoria</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($articlesSet as $article)
              <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->user->name}}</td>
                <td>{{$article->category->name}}</td>
                @switch($type)
                    @case('Null')
                          <td>
                              <a href="{{route('article.setAccepted', compact('article'))}}" class="btn btn-success">Accetta</a>
                              <a href="{{route('article.setDeclined', compact('article'))}}" class="btn btn-danger">Rifiuta</a>
                          </td>
                        @break
                    @case('True')
                          <td>
                            <a href="{{route('article.setDeclined', compact('article'))}}" class="btn btn-danger">Rifiuta</a>
                          </td>
                        @break
                    @case('False')
                          <td>
                            <a href="{{route('article.setAccepted', compact('article'))}}" class="btn btn-success">Accetta</a>
                          </td>
                        @break
                @endswitch
              </tr>
        @endforeach
    </tbody>
</table>