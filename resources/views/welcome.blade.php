<x-layout>
    @if (Session::has('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <ul class="alert alert-success px-5">
                        <li>
                            {{Session::get('message')}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <hr>
        <div class="row mt-5 px-4">
            @foreach ($LastArticles as $article)
                @if ($loop->first)
                <div class="col-8 border-end border-secondary">
                    <div class="border d-flex justify-content-between">
                        <div class="col-5 p-4">
                            <a href="{{route('article.categoryIndex', $article->category->id)}}" class="link-form-custom text-danger">
                                <p class="my-2 text-danger"><i class="{{$article->category->icons}} text-danger me-2"></i>{{$article->category->name}}</p>
                            </a>
                            <h4 class="m-0 fw-bold">{{$article->title}}</h4>
                            <h6>{{$article->subtitle}}</h6>
                            <hr>
                            <p class="text-secondary">{{$article->textFormatter($article->body)}}</p>
                            <div class="d-flex flex-column align-items-end mt-4">
                                <p class="text-dark mb-0">Articolo redatto da:<span class="h5">
                                    <a href="{{route('article.personalIndex', $article->user->id)}}" class="link-form-custom text-dark">
                                        {{$article->user->surname}} {{$article->user->name}}
                                    </a>
                                </span></p>
                                <a href="{{route('article.show', compact('article'))}}" class="link-form-custom text-primary mt-3">Leggi di più</a>
                            </div>
                            <p class="mt-4">Creato il: <span>{{$article->created_at->format('d/m/y')}}</span></p>
                        </div>
                        <div class="col-7">
                            <div class="first-article">
                                <img src="{{Storage::url($article->img)}}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="col-4">
                @foreach ($LastArticles as $article)
                    @if (!$loop->first)
                        <div class="secondary-card border p-3">
                           <div class="d-flex justify-content-between">
                            <a href="{{route('article.categoryIndex', $article->category->id)}}" class="link-form-custom text-danger">
                                <p class="text-danger"><i class="{{$article->category->icons}} text-danger me-2"></i>{{$article->category->name}}</p>
                            </a>
                            <p class="">Articolo creato il: <span>{{$article->created_at->format('d/m/y')}}</span></p>
                           </div>
                            <h4 class="m-0 fw-bold">{{$article->title}}</h4>
                            <h6>{{$article->subtitle}}</h6>
                            <div class="d-flex flex-column align-items-end">
                                <a href="{{route('article.personalIndex', $article->user->id)}}" class="link-form-custom text-dark">
                                    <p class="text-dark mb-0">{{$article->user->surname}} {{$article->user->name}}</p>
                                </a>
                                <a href="{{route('article.show', compact('article'))}}" class="link-form-custom">Leggi di più</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layout>