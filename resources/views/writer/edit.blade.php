<x-layout>
    @if (Session::has('message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <ul class="alert alert-danger px-5">
                        <li>
                            {{ Session::get('message') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8 border border-2 p-5">
                <p class="text-center font-primary mb-5 display-1">Aggiorna il tuo articolo</p>
                <hr>
                <form action="{{ route('writer.update', compact('article')) }}" class="px-5 d-flex flex-column gap-5" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex justify-content-around  mb-3 mt-5">
                        <input type="text" value="{{$article->title}}" class="form-login-custom w-50 me-5"
                            name="title">
                        <input type="text" value="{{$article->subtitle}}"
                            class="form-login-custom w-50 ms-5" name="subtitle">
                    </div>
                    <div class="d-flex flex-column justify-content-around gap-3">
                        <label class="text-secondary">Scegli la categoria</label>
                        <select class="form-login-custom" name="category">
                            <option value="{{$article->category_id}}">{{$article->category->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 d-flex flex-column gap-3">
                        <label for="body" class="text-secondary">Inserisci il tuo articolo</label>
                        <textarea name="body" id="body" cols="30" rows="15" class="form-textarea-custom">
                            {{$article->body}}
                        </textarea>
                    </div>
                    <div class="mb-3 d-flex flex-column gap-3">
                        <input type="text" value="@foreach($article->tags as $tag){{$tag->name}}@endforeach" name="tags" class="form-login-custom" >
                        <p class="text-secondary" aria-disabled="true">Separare ogni tag con una virgola, grazie.</p>
                    </div>
                    <div class="mb-3 d-flex flex-column gap-3">
                        <label for="body" class="text-secondary">Inseisci una immagine riguardante il tuo
                            articolo</label>
                        <input type="file" class="form-file-custom" name="img">
                    </div>
                    <div class="mb-3 d-flex justify-content-end gap-3">
                        <button type="submit" class="form-btn-custom">Aggiorna articolo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
