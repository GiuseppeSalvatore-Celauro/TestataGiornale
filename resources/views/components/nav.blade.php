{{-- prima navbar --}}
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
            <li><a class="dropdown-item" href="#">Action</a></li>
            @auth
            <li><a class="dropdown-item" href="{{route('article.create')}}">Inserisci articolo</a></li>
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
  <nav class="navbar navbar-expand-lg ">
    <div class="container">

    </div>
  </nav>