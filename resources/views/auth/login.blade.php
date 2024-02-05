@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container mt-5 pt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-4 border-2 border text-center p-3">
            <h2 class="display-1 font-primary">TheAulabPost</h2>
                    @if ($errors->any())
                    <div class="col-12 mt-3">
                        <ul class=" alert alert-danger px-5">
                            @foreach ($errors->all() as $error)
                                <li class="bg-transparent">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            <form action="{{ route('login') }}" method="post" class="px-5 mt-5 gap-3 d-flex flex-column">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-login-custom" placeholder="Email" name="email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-login-custom" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btnform-bg-custom fs-4">Accedi</button>
            </form>
            <hr class="mt-5">
            <div class="d-flex justify-content-center">
                <p>Se non hai un account
                    <span class="fst-italic">
                        <a href="{{ route('register') }}" class="link-form-custom text-dark ">Registrati</a>
                    </span>
                </p>
            </div>
            <div>
                <p>
                    oppure
                    <a href="{{route('home')}}" class="link-form-custom text-dark ">
                        torna alla
                        <span class="fst-italic">
                            Home
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
