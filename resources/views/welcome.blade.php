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
    @if (count($LastArticles) > 0)
    <div class="container">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="title-nav fs-1">I nostri ultimi articoli</h4>
            </div>
        </div>
        <hr class="text-secondary">
    </div>
    <div class="container">
        <div class="row mt-5 px-4">
            @foreach ($LastArticles as $article)
                @if ($loop->first)
                <div class="col-12 col-md-8 border-end border-color-secondary mt-2">
                    <div class="border d-flex justify-content-between">
                        <div class="col-12 col-md-5 p-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{route('article.categoryIndex', $article->category->id)}}" class="link-form-custom text-danger">
                                    <p class="text-danger"><i class="{{$article->category->icons}} text-danger me-2"></i>{{$article->category->name}}</p>
                                </a>
                                <p class="text-secondary">
                                    @foreach ($article->tags as $tag)
                                        #{{$tag->name}}
                                    @endforeach
                                </p>
                            </div>
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
                        <div class="col-7 d-none d-md-block">
                            <div class="first-article">
                                <img src="{{Storage::url($article->img)}}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="col-12 col-md-4">
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
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (count($WorldArticles) > 0)
    <div class="container">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="title-nav fs-1">Gli articoli più recenti della sezione mondo</h4>
            </div>
        </div>
        <hr class="text-secondary">
    </div>
    <div class="container">
        <div class="row mt-5 px-4">
            <div class="col-12 col-md-4 d-flex flex-column gap-2  pt-3">
                @foreach ($WorldArticles as $article)
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
                    @endforeach
                </div>
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                @foreach ($WorldArticles as $article)
                    @if ($loop->first)
                        <img src="{{Storage::url($article->img)}}" alt="" class="w-100">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if (count($EconomyArticles) > 0)
    <div class="container">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="title-nav fs-1">Gli articoli più recenti della sezione Economia</h4>
            </div>
        </div>
        <hr class="text-secondary">
    </div>
    <div class="container">
        <div class="row mt-5 px-4">
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                @foreach ($EconomyArticles as $article)
                    @if ($loop->first)
                        <img src="{{Storage::url($article->img)}}" alt="" class="w-100">
                    @endif
                @endforeach
            </div>
            <div class="col-12 col-md-4 d-flex flex-column gap-2  pt-3">
                @foreach ($EconomyArticles as $article)
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
                    @endforeach
                </div>
        </div>
    </div>
    @endif
    @if (count($CinemaArticles) > 0)
    <div class="container">
        <hr class="text-secondary">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="title-nav fs-1">Gli articoli più recenti della sezione Cinema</h4>
            </div>
        </div>
        <hr class="text-secondary">
    </div>
    <div class="container">
        <div class="row mt-5 px-4">
            <div class="col-12 col-md-4 d-flex flex-column gap-2  pt-3">
                @foreach ($CinemaArticles as $article)
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
                    @endforeach
                </div>
            <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
                @foreach ($CinemaArticles as $article)
                    @if ($loop->first)
                        <img src="{{Storage::url($article->img)}}" alt="" class="w-100">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif


</x-layout>