<x-layout>
    <div class="container">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12">
                <h4>Articoli Publicati</h4>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome articolo</th>
                        <th scope="col">Categoria articolo</th>
                        <th scope="col" class="text-end">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($personalArticle as $article)
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->title}}</td>
                            <td>{{$article->category->name}}</td>
                            <td class="text-end">
                                <a href="{{route('writer.show', compact('article'))}}" class="btn btn-primary">Visualizza l'articolo completo</a>
                            </td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-layout>