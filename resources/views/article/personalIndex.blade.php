<x-layout>
    <div class="container">
        <hr>
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <h3>Ultime notizie</h3>
            </div>
            <hr>
            @forelse($articles as $article)
            <div class="col-12">
                <div class=" border mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{Storage::url($article->img)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8 p-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                               <a href="" class="link-form-custom text-danger"> <p class="my-2 text-danger"><i class="{{$article->category->icons}} text-danger me-2"></i>{{$article->category->name}}</p></a>
                                <p>Articolo creato il: <span>{{$article->created_at->format('d/m/y')}}</span></p>
                            </div>
                            <h4 class="m-0 fw-bold">{{$article->title}}</h4>
                            <h6>{{$article->subtitle}}</h6>
                            <hr>
                            <p class="text-secondary">{{$article->textFormatter($article->body)}}</p>
                            <div class="d-flex flex-column align-items-end mt-4">
                                <p class="text-dark mb-0">Articolo redatto da:<span class="h5"><a href="{{route('article.personalIndex', $article->user->id)}}" class="link-form-custom text-dark">{{$article->user->surname}} {{$article->user->name}}</a></span></p>
                                <div class="d-flex justify-content-between w-100">
                                    <p class="text-secondary">
                                        @foreach ($article->tags as $tag)
                                            #{{$tag->name}}
                                        @endforeach
                                    </p>
                                    <a href="{{route('article.show', compact('article'))}}" class="link-form-custom">Leggi di più</a>
                                </div>
                            </div>
                      </div>
                    </div>
                  </div>
            </div>
            @empty
            <div class="col-8 text-center mt-5">
                <h3>Siamo spiacenti, ma questo utente non ha mai caricato nessun articolo</h3>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>