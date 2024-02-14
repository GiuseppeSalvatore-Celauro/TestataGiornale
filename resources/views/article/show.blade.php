<x-layout>
    <div class="container border  p-5 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <a href="{{route('article.categoryIndex', $article->category->id)}}" class="link-form-custom text-danger">
                        <p class="text-danger fs-5"><i class="{{$article->category->icons}} text-danger me-2"></i>{{$article->category->name}}</p>
                    </a>
                    <p class="text-secondary">
                        Tags:
                        @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                        @endforeach
                    </p>
                </div>
                <h1 class="display-4 fw-bold font-lato">{{$article->title}}</h1>
                <h3 class="display-6 fw-bold text-secondary opacity-50 font-lato">{{$article->subtitle}}</h3>
                <hr>
                <div class="d-flex justify-content-between">
                    <a href="{{route('article.personalIndex', $article->user->id)}}" class="link-form-custom text-dark">
                        <h5 class="text-dark">Creato da: {{$article->user->surname}} {{$article->user->name}}</h5>
                    </a>
                    <h6>il: {{$article->created_at->format('d/m/y')}}</h6>
                </div>
                <img src="{{Storage::url($article->img)}}" alt="" class="img-fluid w-100 my-3">
                <p class="fs-4 font-lato">{{$article->body}}</p>
            </div>
        </div>
    </div>
</x-layout>