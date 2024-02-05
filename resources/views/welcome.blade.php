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
</x-layout>