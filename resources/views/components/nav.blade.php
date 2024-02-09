@switch(Route::CurrentRouteName())
    @case('admin.tables')
    <nav class="navbar navbar-expand-lg ">
      <div class="container">
        <div class="date">
          <h4 id="date-jurnal-nav"></h4>
        </div>
        <div>
          <h1 class="title-nav">
            Buongirono, {{Auth::user()->name}}
          </h1>
        </div>
        <div class="right-side-nav">
          <div class="dropdown me-3">
            <button class="dropdown-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('home')}}">Ritorna alla home</a></li>
              <li><a class="dropdown-item" href="{{route('article.create')}}">Inserisci articolo</a></li>
              <li><a class="dropdown-item" href="{{route('article.index')}}">Notizie</a></li>
              <hr>
              <li>
                <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn w-100 text-start">Logout</button>
                </form>
              </li>
            </ul>
          </div>
          <div class="mt-2">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg">
      <div class="container justify-content-center border-top pt-4">
          <h4 class="text-secondary">Ecco a te la tua aria di lavoro</h4>
      </div>
    </nav>
        @break
    @case(2)

        @break
    @default
    <nav class="navbar navbar-expand-lg ">
      <div class="container">
        <div class="date">
          <h4 id="date-jurnal-nav"></h4>
        </div>
        <div>
          <a href="{{route('home')}}" class="navlink-custom text-dark">
            <h1 class="title-nav">
              TheAulabPost
            </h1>
          </a>
        </div>
        <div class="right-side-nav">
          @auth
            <div class="mt-1 me-3">
              <p>Benvenuto, {{Auth::user()->name}}</p>
            </div>
          @endauth
          <div class="dropdown me-3">
            <button class="dropdown-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('article.index')}}">Notizie</a></li>
              @auth
                <li><a class="dropdown-item" href="{{route('article.create')}}">Inserisci articolo</a></li>
                <li><a class="dropdown-item" href="{{route('work.WorkWithUs')}}">Lavora con noi</a></li>
                  @if (Auth::user()->is_admin)
                    <li><a class="dropdown-item" href="{{route('admin.tables')}}">Accedi alla tua area di lavoro</a></li>
                  @endif
                  @if (Auth::user()->is_revisor)
                    <li><a class="dropdown-item" href="{{route('revisor.tables')}}">Accedi alla tabella da revisore</a></li>
                  @endif
              @endauth
              @guest
                <li><a class="dropdown-item" href="{{route('login')}}">Accedi/Registrati</a></li>
              @else
              <hr>
              <li>
                <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn w-100 text-start">Logout</button>
                </form>
              </li>
              @endguest
            </ul>
          </div>
          <div class="mt-2">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
        </div>
      </div>
    </nav>
  {{-- con categorie di back-end --}}
    <nav class="navbar navbar-expand-lg">
      <div class="container justify-content-center border-top pt-4">
          <div class="cat">
            <ul class="d-flex gap-5 text-center">
              @foreach ($categories as $category)
                  <li><a href="{{route('article.categoryIndex', $category)}}" class="navlink-custom text-dark">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </div>
      </div>
    </nav>

@endswitch